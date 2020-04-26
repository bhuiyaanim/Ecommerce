<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $guarded = [];
    
    public function brand()
    {
        return $this->belongsTo('App\Model\Admin\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Admin\Category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Model\Admin\Subcategory');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Model\Frontend\Wishlist');
    }

    public function details()
    {
        return $this->hasMany('App\Model\Frontend\OrderDetails');
    }
}
