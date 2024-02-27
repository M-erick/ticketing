<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $ticketType = $request->input('ticket-type');
        $event = Event::where('vip_ticket_price', '>', 0)->first();
    
       
    
    
        Reservation::create([
            'user_name' => $request->input('your-name'),
            'user_email' => $request->input('your-email'),
            'ticket_type' => $ticketType,
            'event_title' => $request->input('event'),
        ]);

            // You can redirect or respond as needed
            return redirect()->route('events.show', $event->id)->with('success', 'Booking successful!');
     
    }
}









