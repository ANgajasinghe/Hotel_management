<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'id',
        'fname',
        'lname',
        'nic',
        'email',
        'phone',
        'address'
    ];
}
