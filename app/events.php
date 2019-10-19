<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable = [
        'c_name',
        'event_date',
        'time',
        'category',
        'guests',
        'mid',
        'advance',
        'total',
    ];
}
