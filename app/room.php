<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = [
        'id',
        'floor',
        'availability',
        'status',
        'description',
        't_id'
    ];
}
