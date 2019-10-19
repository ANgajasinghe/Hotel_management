<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'id',
        'sup_id',
        'sup_name',
        'item',
        'amount',
        'sup_date'
    ];
}
