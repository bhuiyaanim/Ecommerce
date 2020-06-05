<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable = [
        'post_category_id', 'post_title_en', 'post_title_bn', 'post_image', 'details_en', 'details_bn'
    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Admin\PostCategory');
    }

}
