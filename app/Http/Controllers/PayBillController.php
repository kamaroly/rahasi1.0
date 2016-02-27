<?php

namespace Rahasi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Rahasi\Http\Requests;
use Rahasi\Http\Requests\PayBillPostRequest;
use Rahasi\Models\User;
use Rahasi\Repositories\PayBillRepository;
use Vinkla\Hashids\HashidsManager;

class PayBillController extends Controller
{
   

	function __construct(PayBillRepository $payBill,User $currentUser,HashidsManager $hashids) 
    {
        parent::__construct();
        $this->payBill  = $payBill;
        $this->hashids  = $hashids;
        $this->currentUser = $currentUser->find($this->user->id);
        
	}

	/**
	 * Fetch all bills
	 * @return EllipseSynergie\ApiResponse\Laravel\Response
	 */
    public function index()
    {
        $bills = $this->currentUser->bills()->paginate(config('rahasi.per_page'));

        return view('paybills.list',compact('bills'));
    }

    /**
     * Show pay bill transaction by its Id
     * @param  integer $id 
     * @return json  
     */
    public function show($hash)
    {
        try
        {
            $billId = $this->hashids->decode($hash)[0];
            $bill = $this->payBill->get($billId);

            return view('paybills.show',compact('bill'));
        }
        catch(Exception $ex){
            Event::fire('exception.thrown', $ex);

            Log::critical($ex->getMessage());

            return redirect()->back();
        }
    }

   
}
