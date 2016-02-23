<?php

namespace Rahasi\Http\Controllers\Apis;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
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

	function __construct(Response $response,PayBillRepository $payBill) 
    {
        $this->response = $response;
        $this->payBill  = $payBill;
        $this->key = request()->header(Config::get('apiguard.keyName', 'X-Authorization'));
        parent::__construct();
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {

    	 try {

        	return $this->response->withCollection($this->data, new PayBillTransform);

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

            $paybill = $this->data;

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
            $response['error']['message'] = trans('general.invalid_json_input');
            $this->response->setStatusCode(400);
            return $this->response->withArray($response);
        }

        $inputs = (array) json_decode($inputs);

        $validations = Validator::make($inputs,(new PayBillPostRequest)->rules());
        
        if ($validations->fails()) {
           return $this->response->errorWrongArgsValidator($validations);
        }

        // Everything in terms of validation looks good so far
        // now let's proceed with the payment of the bill
        $inputs['ip_address']  =  $request->getClientIp();
        $inputs['raw_request'] =  $request->getContent();
        $inputs['key']         =  $this->key;

        $payBill = (array) $this->payBill->transact($inputs);

        return $payBill;

    }
}
