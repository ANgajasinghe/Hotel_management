<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventReport extends Model
{
    protected $fillable = [

        'customer_name',
        'event_date',
        'event_time',
        'event_manager',
        'attendence',
        'cost',
        'etotal',
        'btotal'

    ];

}
