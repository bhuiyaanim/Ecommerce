<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Model\Admin\Product');
    }

}
