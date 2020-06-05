<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Model\Frontend\User');
    }
}
