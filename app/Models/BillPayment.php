<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class BillPayment extends Model
{
    protected  $table = "bill_payments";

    protected $fillable =
    [
		'transactionid',
		'external_transactionid',
		'merchant_code',
		'description',
		'reference_number',
		'amount',
		'response_code',
		'response_description',
		'merchant_host',
		'ip_address',
		'raw_request',
		'raw_response',
		'api_key_id',
    ];

    /**
     * Use a mutator to derive the appropriate hash for this bill
     *
     * @return mixed
     */
    public function getHashAttribute()
    {
        return Hashids::encode($this->attributes['id']);
    }
}