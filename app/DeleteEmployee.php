<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeleteEmployee extends Model
{
    protected $fillable = ['empid', 'name', 'email', 'tp'];
}
