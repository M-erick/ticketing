<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;

use App\Notifications\TicketPurchased;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'ticket-type' => 'required|string',
            'event' => 'required|string',
        ]);
        

        $userEmail = $request->input('user_email');
        $userReservationTicketCount = Reservation::where('user_email',$userEmail)->count();

        if ($userReservationTicketCount >= 5) {
            return redirect()->back()->with('error', 'You can only reserve up to 5 tickets.');
        }
        

        
        $ticketType = $request->input('ticket-type');
        $event = Event::where('vip_ticket_price', '>', 0)->first();
    
       
    
        $eventTitle = $request->input('event');
        $userName = $request->input('user_name');
    
        $reservation = Reservation::create([
            'user_name' => $request->input('user_name'),
            'user_email' => $request->input('user_email'),
            'ticket_type' => $ticketType,
            'event_title' => $eventTitle,
        ]);

        // Trigger the notification

        // $email = $user->email; // Use the user's email address

    Mail::to( $userEmail)->send(new CustomMail($eventTitle, $userName, $ticketType));

            // You can redirect back to the current page with the message
            return redirect()->back()->with('success', 'Booking successful! Ticket Type: ' . $ticketType . ', Event Title: ' . $request->input('event'));
     
    }
    public function showUserReservations()
{
    // Retrieve the authenticated user's reservations
    $reservations = Reservation::all();

    return view('reservations.index',compact('reservations'));
}

   
// public function sendEmail()
// {
//     $email = 'faithmuriuki105@gmail.com'; // Replace with the recipient's email address

//     Mail::to($email)->send(new CustomMail());

//     return 'Email sent successfully!';
// }


}









