<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class User extends Model
{
    protected  $table = "users";

    /**
     * Get the merchants for the blog post.
     */
    public function merchant()
    {
        return $this->hasOne('Rahasi\Models\Merchant','user_id','id');
    }

    /**
     * Get all of the payBill for the user.
     */
    public function bills()
    {
        return $this->hasManyThrough('Rahasi\Models\BillPayment', 'Rahasi\Models\ApiKey', 'user_id', 'api_key_id');
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