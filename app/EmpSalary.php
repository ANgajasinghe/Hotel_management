<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpSalary extends Model
{
    protected $fillable = [
        'id', 'type', 'name', 'month', 'salary'
    ];
}
