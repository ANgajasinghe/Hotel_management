<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventT extends Model
{
    protected $fillable = [
        'client_name',
        'event_date',
        'event_time',
        'category',
        'no_of_guests',
        'food_menu',
        'clients_menu'
    ];
}
