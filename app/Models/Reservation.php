<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable =[
        'user_name',
        'user_email',
        'event_title',
        'ticket_type',
    ];
    public function user()
{
    return $this->belongsTo(User::class);


}

   
}
