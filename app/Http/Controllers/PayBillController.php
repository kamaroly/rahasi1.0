<?php

namespace Rahasi\Http\Controllers;

use Rahasi\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Repositories\PayBillRepository;
use Rahasi\Http\Requests\PayBillPostRequest;

class PayBillController extends Controllers
{
   

	function __construct(PayBillRepository $payBill) 
    {
        $this->payBill  = $payBill;
        parent::__construct();
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {
        //
    }

    /**
     * Show pay bill transaction by its Id
     * @param  integer $id 
     * @return json  
     */
    public function show($id)
    {
          //
    }

   
}
