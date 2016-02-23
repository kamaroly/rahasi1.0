<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Merchant extends Model
{
    protected  $table = "merchants";

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