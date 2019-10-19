<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expends extends Model
{
    protected $fillable = [
        'id',
        'type',
        'amount',
        'date'
    ];
}
