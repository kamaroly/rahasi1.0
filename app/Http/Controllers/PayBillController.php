<?php

namespace Rahasi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
use Rahasi\Models\User;
use Rahasi\Repositories\PayBillRepository;

class PayBillController extends Controller
{
   

	function __construct(PayBillRepository $payBill,User $currentUser) 
    {
        parent::__construct();
        $this->payBill  = $payBill;
        $this->currentUser = $currentUser->find($this->user->id);
        
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {
        $bills = $this->currentUser->bills;
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
