<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;

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
}