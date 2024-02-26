<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Event extends Model
{

    use HasFactory;
    protected $dates = ['start_datetime', 'end_datetime'];

   

    protected $fillable =[
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'vip_ticket_price',
        'regular_ticket_price',
        'max_attendees',
        'image_path',
        'location',


    ];

    // format the  start_time in events model
    public function formattedDate()
    {
        // Check if 'start_datetime' is null
        if ($this->start_datetime === null) {
            return 'No start time available';
        }
    
        $start_datetime = new Carbon($this->start_datetime);
    
        // Format the date
        return $start_datetime->format('d F Y, H:i:s');
    }
    // Format the start_datetime in events model
    public function formattedStartDate()
    {
        return $this->formattedDate($this->start_datetime);
    }

    // Format the end_datetime in events model
    public function formattedEndDate()
    {
        return $this->formattedDate($this->end_datetime);
    } 
}
