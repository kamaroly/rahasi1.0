<?php 

namespace Rahasi\Repositories;

use Rahasi\Contracts\PayBillRepositoryInterface;
use Rahasi\Exceptions\BillPaymentTransactionNotFoundException;
use Rahasi\Exceptions\MerchantApiKeyEnvironmentException;
use Rahasi\Exceptions\MerchantApiKeyException;
use Rahasi\Exceptions\PayBillTransactionRecordFailedException;
use Rahasi\Models\BillPayment;
use Rahasi\Models\user;
use Rahasi\Services\BillerService;

/**
* PayBill repository
*/
class PayBillRepository implements PayBillRepositoryInterface
{
	protected $keyDatails;
	protected $apiKeyRepo;
	protected $billPayment;
	protected $billerService;
	protected $merchantDetails;

	function __construct(ApiKeyRepository $apiKeyRepo,BillPayment $billPayment,BillerService $billerService,MerchantRepository $merchantRepo,User $user)
	{
		$this->user = $user;
		$this->apiKeyRepo		= $apiKeyRepo;
		$this->billPayment		= $billPayment;
		$this->billerService	= $billerService;
		$this->merchantRepo		= $merchantRepo;
	}


	/**
	 * Perform transaction for the bill payment
	 * @param  array  $data 
	 * @return array
	 */
	public function transact(array $data)
	{
		// Prepare data
		$this->keyDatails					= $data['key'];
		$this->merchantDetails				= $this->merchantRepo->getByMerchantCode($data['merchant_code']);
		

		$data['api_key_id']					= $this->keyDatails->id;
		$data['external_transactionid']		= $data['transactionid'];
		$data['transactionid']				= $this->generateKey();
		
		// Prepare information to send to merchant
		$merchantRequest = [];
		$merchantRequest['transactionid']		= $data['transactionid'];
		$merchantRequest['description']			= $data['description'];
		$merchantRequest['reference_number']	= $data['reference_number'];
		$merchantRequest['customer']			= $data['msisdn'];
		$merchantRequest['amount']				= $data['amount'];
		$merchantRequest['amount']				= $data['amount'];
		$merchantRequest['payment_method']		= $this->keyDatails->user->company_name;

		// Determine which merchant host to  use
		$merchantRequest['merchant_host'] = $data['merchant_host']				= $this->getMerchantUrl();
		$merchantRequest['merchant_key'] = $data['merchant_key']				= $this->getMerchantKey();
		
		// Call external services
		$billing							= $this->billerService->bill($merchantRequest);
		
		// Remove sensitive information
		unset($merchantRequest['merchant_host']);
		unset($merchantRequest['merchant_key']);

		$data['raw_request_to_merchant']	= json_encode($merchantRequest);
		$data['raw_response_from_merchant']	= json_encode((array) $billing);
		
		$response							= [];
		$data['raw_response']				= $billing->raw_response;
		$data['response_code']				= $response['code'] = $billing->response_code;
		
		$response['status']					= $data['status']=  $billing->response_status;
		$data['response_description']		= $response['description'] = $billing->response_description;
		$response['transactionid']			= $billing->transactionId;
		
		$data['raw_response_to_payment_gw']	= json_encode($response);

		// save information to the database;
		if (!$this->billPayment->create($data)) {
			throw new PayBillTransactionRecordFailedException("Error while saving PayBillInformation".json_encode($data), 1);
		};

		return $response;

	}

	/**
	 * Get Bill by ID
	 * @param  numeric $billId 
	 * @return    
	 */
	public function get($billId)
	{
		return $this->billPayment->find($billId);
	}
	
	/**
	 * Get user bill 
	 * @param  array  $condition contains condition for the bill
	 * @return Rahasi\Models\PayBIll
	 */
	public function userBillByTransactionId($external_transactionid,$user_id)
	{
		$user = $this->user->with('bills')->find($user_id);

		if (is_null($user)) {
			return [];
		}

		// If we can find the user, let's find the transaction id
		$transaction = $user->bills()->where('external_transactionid',$external_transactionid)->first();

		if (empty($transaction)) {
			throw new BillPaymentTransactionNotFoundException("Bill payment transaction with external transaction id:".$external_transactionid." not found", 1);
			
		}
		return $transaction;
	}

	/**
	 * Get merchant url
	 * @param   $merchant_code 
	 * @return  string url
	 */
	private function getMerchantUrl()
	{
		switch (strtolower(trim($this->keyDatails->environment))) {
			case 'test':
				return $this->merchantDetails->test_url;	
				break;
			case 'live':
				return $this->merchantDetails->live_url;	
			default:
				throw new MerchantApiKeyEnvironmentException("Unable to determine api key environment", 1);
				break;
		}
	}

	/**
	 * Get transaction per merchant code
	 * @param  $merchant_code 
	 * @return Illuminate\Support\Collection
	 */
	public function getPaymentsByMerchantCode($merchant_code)
	{
		return $this->billPayment->where('merchant_code',$merchant_code)->paginate(config('rahasi.per_page'));
	}


	/**
	 * Get transaction per external transaction id and api
	 * @param  string $external_transactionid
	 * @param  string $api_key_id
	 * @return Rahasi\Models\BillPayment
	 */
	public function getByExternalTransactionId($external_transactionid,$api_key_id)
	{
		return $this->billPayment->where('external_transactionid',$external_transactionid)
								 ->where('api_key_id',$api_key_id)
								 ->first();
	}


	/**
	 * Get merchant key
	 * @param   $merchant_code 
	 * @return  string url
	 */
	private function getMerchantKey()
	{
		switch (strtolower(trim($this->keyDatails->environment))) {
			case 'test':
				return $this->merchantDetails->test_key;	
				break;
			case 'live':
				return $this->merchantDetails->live_key;	
			default:
				throw new MerchantApiKeyException("Unable to determine api key environment", 1);
				break;
		}
	}

	 /**
     * A sure method to generate a unique transactionID
     *
     * @return string
     */
    public function generateKey()
    {
        do {
            $salt = sha1(time() . mt_rand());
            $newKey = time().substr($salt, 0, 30);
        } // Already in the DB? Fail. Try again
        while ($this->transactionExists($newKey));

        return $newKey;
    }


     /**
     * Checks whether a transactionid exists in the database or not
     *
     * @param $key
     * @return bool
     */
    private function transactionExists($transactionid)
    {
        $apiKeyCount = $this->billPayment->where('transactionid', '=', $transactionid)
        					->limit(1)->count();
        if ($apiKeyCount > 0) return true;
        return false;
    }
}