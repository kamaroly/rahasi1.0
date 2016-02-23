<?php

namespace Rahasi\Http\Requests;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Rahasi\Http\Requests\Request;

class EditMerchantRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Sentry::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
                'names'                       => 'required|min:5',
                'address'                     => 'required|min:5',
                'service_fees'                => 'required|numeric',
                'bank_account_number'         => 'required',
                'bank_account_name'           => 'required',
                'bank_name'                   => 'required',
                'merchant_code'               => 'required',
                'contact_person_names'        => 'required',
                'contact_person_phone_number' => 'required',
                'contact_person_email'        => 'required|email',
                'settlement_frequency'        => 'required',
                'test_url'                    => 'required',
                'test_key'                    => 'required',
                'live_url'                    => 'required',
                'live_key'                    => 'required',
        ];
    }
}
