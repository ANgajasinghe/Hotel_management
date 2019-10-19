<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'id',
        'type',
        'Requesting_date',
        'leaving_date',
        'nof_days',
        'leve_type',
    ];
}
