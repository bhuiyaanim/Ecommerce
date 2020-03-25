<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_category_id', 'post_title_en', 'post_title_bn', 'post_image', 'details_en', 'details_bn'
    ];

    // public function post_category()
    // {
    //     return $this->belongsTo('App\Model\Admin\PostCategory');
    // }

    public function postcategory()
    {
        return $this->belongsTo('App\Model\Admin\PostCategory');
    }

}
