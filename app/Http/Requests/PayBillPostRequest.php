<?php

namespace Rahasi\Http\Requests;

use Rahasi\Http\Requests\Request;

class PayBillPostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $this->all();

       return [
                  'transactionid'    =>'required|alpha_dash',
                  'merchant_code'    =>'required|alpha_dash|exists:merchants',
                  'description'      =>'required',
                  'msisdn'           =>'required|alpha_dash',
                  'reference_number' =>'required|alpha_dash',
                  'amount'           =>'required|numeric',
              ];

    }

 
}
