<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenditure extends Model
{
    protected $fillable = [
        'id',
        'type',
        'amount',
        'date',
        'o_id'
    ];
}
