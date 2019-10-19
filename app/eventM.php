<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventM extends Model
{
    protected $fillable = [
        'menu_name',
        'menu_type',
        'main_dishes',
        'salads',
        'deserts',
        'beverages',
        'price'

    ];
}
