<?php

namespace Rahasi\Http\Controllers\Apis;

use EllipseSynergie\ApiResponse\Laravel\Response;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Exceptions\BillPaymentTransactionNotFoundException;
use Rahasi\Http\Controllers\Apis\RahasiApiGuardController;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
use Rahasi\Models\User;
use Rahasi\Repositories\ApiKeyRepository;
use Rahasi\Repositories\PayBillRepository;
use Rahasi\Transformers\PayBillTransformer;


class PayBillApiController extends RahasiApiGuardController
{
    protected $apiMethods = [
        'show' => [
            'limits' => [
                'method' => [
                    'increment' => '1 minutes',
                    'limit' => 60
                ]
            ]
        ],
        'store' => [
            'limits' => [
                'method' => [
                    'increment' => '1 minutes',
                    'limit' => 60
                ]
            ]
        ],
    ];

    protected $payBill;

	function __construct(Response $response,PayBillRepository $payBill,ApiKeyRepository $key) 
    {
        parent::__construct($key);  
        $this->response = $response;
        $this->payBill  = $payBill;
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {

    	 try {

            $data = $this->payBill->get()->paginate(20);
        	return $this->response->withCollection($data, new PayBillTransformer);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }

    /**
     * Show pay bill transaction by its Id
     * @param  integer $id 
     * @return json  
     */
    public function show($transactionid)
    {
        try {

            $paybill = $data = $this->payBill->userBillByTransactionId($transactionid,$this->key->user_id);

            return $this->response->withItem($paybill, new PayBillTransformer);

        } 
        catch (BillPaymentTransactionNotFoundException $e) {
            return $this->response->errorNotFound();
        }
        catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
        catch(Exception $e){
            return $this->response->errorInternalError();
        }
    }

    /**
     * Store paybill transactino
     * @param  PayBillPostRequest $request
     * @return json
     */
    public function store(Request $request)
    {

        $inputs = $request->getContent();

        if (!isJson($inputs)) {
            $response['error']['code'] = 'GEN-WRONG-ARGS';
            $response['error']['http_code'] = 400;
            $response['error']['message'] = trans('validation.invalid_json_input');
            $this->response->setStatusCode(400);
            return $this->response->withArray($response);
        }

        $inputs = (array) json_decode($inputs);

        // Verify if this external transaction id is not duplicated
        $previousTransaction = $this->payBill->getByExternalTransactionId($inputs['transactionid'],$this->key->id);
        if (!is_null($previousTransaction)) {
            // The user is submitted transaction ID that exists already at our end
            // We need to respond with the validation error and ask him/her 
            // to provide a unique transaction id
            
            $response['error']['code'] = 'GEN-WRONG-ARGS';
            $response['error']['http_code'] = 400;
            $response['error']['message'] = trans('validation.transactionid_has_been_used_by_you_before',['transactionid'=>$inputs['transactionid']]);
            $this->response->setStatusCode(400);
            return $this->response->withArray($response);
        }


        $validations = Validator::make($inputs,(new PayBillPostRequest)->rules());
        
        if ($validations->fails()) {
           return $this->response->errorWrongArgsValidator($validations);
        }

        // Everything in terms of validation looks good so far
        // now let's proceed with the payment of the bill
        $inputs['ip_address']                  =  $request->getClientIp();
        $inputs['raw_request_from_payment_gw'] =  $request->getContent();
        $inputs['key']                         =  $this->key;

        $payBill = (array) $this->payBill->transact($inputs);

        return $this->show($inputs['transactionid']);
    }
}
