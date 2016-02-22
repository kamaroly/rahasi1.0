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
        return [
            //
        ];
    }

    public function all()
    {

        $request = trim(file_get_contents('php://input'));

        $request = (array) json_decode($request);

        return $request;
    }
}
