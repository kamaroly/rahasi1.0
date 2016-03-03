<?php

namespace Rahasi\Http\Controllers\Apis;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
use Rahasi\Repositories\ApiKeyRepository;
use Rahasi\Repositories\PayBillRepository;
use Rahasi\Transformers\PayBillTransform;


class PayBillApiController extends ApiGuardController
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

    protected $key;
    protected $payBill;

	function __construct(Response $response,PayBillRepository $payBill,ApiKeyRepository $key) 
    {
        $this->response = $response;
        $this->payBill  = $payBill;
        $this->key = $key->getByKey(request()->header(Config::get('apiguard.keyName', 'X-Authorization')));
        parent::__construct();
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {

    	 try {

            $data = $this->payBill->get()->paginate(20);
        	return $this->response->withCollection($data, new PayBillTransform);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }

    /**
     * Show pay bill transaction by its Id
     * @param  integer $id 
     * @return json  
     */
    public function show($id)
    {
        try {

            $paybill = $data = $this->payBill->get($id,$this->keyDatails->id);

            return $this->response->withItem($paybill, new PayBillTransform);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

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

        return $payBill;

    }
}
