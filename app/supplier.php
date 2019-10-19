<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'type',
        'item',
        'inac_date',
        'bank',
        'acc_no'
    ];
}
