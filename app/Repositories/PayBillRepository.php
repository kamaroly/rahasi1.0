<?php 

namespace Rahasi\Repositories;

use Rahasi\Contracts\PayBillRepositoryInterface;
use Rahasi\Models\BillPayment;
use Rahasi\Services\BillerService;

/**
* PayBill repository
*/
class PayBillRepository implements PayBillRepositoryInterface
{
	protected $apiKeyRepo;
	protected $billPayment;
	protected $billerService;
	function __construct(ApiKeyRepository $apiKeyRepo,BillPayment $billPayment,BillerService $billerService)
	{
		$this->apiKeyRepo = $apiKeyRepo;
		$this->billPayment = $billPayment;
		$this->billerService = $billerService;
	}

	public function transact(array $data)
	{
		// Prepare data
		$data['api_key_id'] = $this->apiKeyRepo->getByKey($data['key'])->id;
		$data['external_transactionid'] = $data['transactionid'];
		$data['transactionid'] = $this->generateKey();

		// Determine which merchant host to  use
		/** 
		 * @todo proper resolution of the merchant host 
		 */
		$data['merchant_host'] = '127.0.0.1';

		// Call external services
		$billing = $this->billerService->bill($data);
		$response = [];
		$data['raw_response'] = $billing->raw_response;
		$data['response_code'] = $response['code'] = $billing->response_code;

		$response['status']    = $billing->response_status;
		$data['response_description'] = $response['description'] = $billing->response_description;
		$response['transactionid']    = $billing->transactionId;


		// Unset un necessary information 
		unset($data['key']);
		// save information to the database;
		$this->billPayment->unguard();
		$this->billPayment->create($data);

		return $response;

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