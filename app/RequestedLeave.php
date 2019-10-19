<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestedLeave extends Model
{
    protected $fillable = [
        'eid',
        'name',
        'Requesting_date',
        'leaving_date',
        'nof_days',
        'leve_type',
    ];
}
