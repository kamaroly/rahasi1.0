<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Merchant extends Model
{
    protected  $table = "merchants";

    protected $fillable =[
    	'names',
		'address',
		'service_fees',
		'bank_account_number',
		'bank_account_name',
		'bank_name',
		'merchant_code',
		'contact_person_names',
		'contact_person_phone_number',
		'contact_person_email',
		'settlement_frequency',
		'test_url',
		'test_key',
		'live_url',
		'live_key',
		'user_id',
		'raw_request',
    ];
    
   /**
	 * Get the user that owns the phone.
	 */
	public function user()
	{
	    return $this->belongsTo('Rahasi\Models\User', 'user_id');
	}

	/**
	 * Get the user that owns the phone.
	 */
	public function bills()
	{
	    return $this->hasMany('Rahasi\Models\BillPayment', 'merchant_code','merchant_code');
	}

	/**
     * Use a mutator to derive the appropriate hash for this user
     *
     * @return mixed
     */
    public function getHashAttribute()
    {
        return Hashids::encode($this->attributes['id']);
    }
}