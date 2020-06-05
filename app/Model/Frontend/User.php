<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany('App\Model\Frontend\Order');
    }
}
