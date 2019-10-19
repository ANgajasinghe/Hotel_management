<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [

        'id',
        'type',
        'image',
        'name',
        'gender',
        'NIC',
        'Address',
        'DOB',
        'salary',
        'joindate',
        'tp',
        'tp2',
        'Email',
        'attendence',
        'remark',

    ];

}
