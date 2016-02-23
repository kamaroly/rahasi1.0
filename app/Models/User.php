<?php

namespace Rahasi\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected  $table = "users";

    /**
     * Get the merchants for the blog post.
     */
    public function merchants()
    {
        return $this->hasMany('Rahasi\Models\Merchant','user_id','id');
    }

    /**
     * Get all of the payBill for the user.
     */
    public function bills()
    {
        return $this->hasManyThrough('Rahasi\Models\BillPayment', 'Rahasi\Models\ApiKey', 'user_id', 'api_key_id');
    }
}