<x-app-layout>


    <h2>{{ $event->title }}</h2>
    <p>{{ $event->description }}</p>
    <p>Starts: {{ $event->start_datetime }}</p>
    <p>Ends: {{ $event->end_datetime }}</p>
    <p>VIP Ticket Price: {{ $event->vip_ticket_price }}</p>
    <p>Regular Ticket Price: {{ $event->regular_ticket_price }}</p>
    <p>Max Attendees: {{ $event->max_attendees }}</p>
    <a href="{{ route('events.edit', $event->id) }}">Edit Event</a>
</x-app-layout>

