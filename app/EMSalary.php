<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EMSalary extends Model
{
    protected $fillable = [
        'id', 'month', 'salary'
    ];
}
