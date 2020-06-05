<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'vat', 'shapping_charge', 'shop_name', 'email', 'phone', 'address', 'logo'
    ];
}
