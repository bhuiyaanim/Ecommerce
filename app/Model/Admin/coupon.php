<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = [
        'coupon', 'discount'
    ];
}
