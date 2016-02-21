<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformers\PayBillTransform;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;


class PayBillController extends ApiGuardController
{
	 protected $apiMethods = [
        'show' => [
            'logged' => true
        ]
    ];

	function __construct(Response $response) 
    {
        $this->response = $response;

    	$this->data  = [
                 'msisdn'=>'250726044221',
                 'company_id'=>'ELECT',
                 'reference'=>'04223731771',
                 'amount'=>100,
                 'api_key_id'=>'8aaf19d386b3277451fbfd2c8f3b3422d6346d69',
                 '_token' =>csrf_token(),
                 ];	
        
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

    public function show($id)
    {
        try {

            $paybill = $this->data;

            return $this->response->withItem($paybill, new PayBillTransform);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }
}
