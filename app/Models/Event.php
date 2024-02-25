<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'vip_ticket_price',
        'regular_ticket_price',
        'max_attendees',

    ];
    protected $dates = ['start_datetime', 'end_datetime'];
}
