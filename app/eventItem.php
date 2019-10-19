<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventItem extends Model
{
    protected $fillable = [
        'event_date',
        'rq_date',
        'item_name',
        'qty',

    ];
}
