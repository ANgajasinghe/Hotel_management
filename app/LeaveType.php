<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $table = 'leave_types';
    protected $fillable = [
        'leve_type',
        'allow_leaves'
    ];
}

