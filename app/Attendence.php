<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = [
        'id',
        'type',
        'name',
        'date',
        'count',
        'created_at',
    ];
}
