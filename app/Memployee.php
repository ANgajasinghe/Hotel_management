<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memployee extends Model
{
    protected $fillable = [
        'id',
        'type',
        'name',
        'day',
        'month',
        'count',
        'created_at',
    ];
}
