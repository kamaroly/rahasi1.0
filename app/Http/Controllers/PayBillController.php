<?php

namespace Rahasi\Http\Controllers;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
use Rahasi\Transformers\PayBillTransform;


class PayBillController extends ApiGuardController
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

	function __construct(Response $response) 
    {
        $this->response = $response;
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
        $inputs = (array) json_decode($request->getContent());

        $validations = Validator::make($inputs,(new PayBillPostRequest)->rules());
        
        if ($validations->fails()) {
           return $this->response->errorWrongArgsValidator($validations);
        }

        // Call PayBillRepository
    }
}
