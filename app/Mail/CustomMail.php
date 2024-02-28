<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;
    public $eventTitle;
    public $userName;
    public $ticketType;


    /**
     * Create a new message instance.
     */
   
     public function __construct($eventTitle, $userName, $ticketType)
    {
        $this->eventTitle = $eventTitle;
        $this->userName = $userName;
        $this->ticketType = $ticketType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reservation Ticket',
        );
    }

    /**
     * Get the message content definition.
     */
   
     public function content(): Content
     {
         return new Content(
             view: 'emails.index',
         );
     }

     public function build()
     {
         return $this->view('emails.index');
     }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
