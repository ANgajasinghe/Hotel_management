<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estaff extends Model
{
    protected $fillable = [
        'event_id',
        'type',
        'count'
    ];
}
