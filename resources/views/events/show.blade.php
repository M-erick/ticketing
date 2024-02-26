<x-app-layout>
    <div style="border-radius: 10px; overflow: hidden; background-color: white;">
        <div style="overflow: hidden; border-radius: 10px 10px 0 0; padding: 10px;">
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 20px; background-color: white;">
            <h2 style="font-size: 2rem; margin-bottom: 10px;">{{ $event->title }}</h2>
            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px;">{{ $event->location }}</p>

            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px;">{{ $event->description }}</p>
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <p style="font-size: 1rem; color: #666;">Starts: {{ $event->start_datetime }}</p>
                <p style="font-size: 1rem; color: #666;">Ends: {{ $event->end_datetime }}</p>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <p style="font-size: 1rem; color: #666;">VIP Ticket Price: {{ $event->vip_ticket_price }}</p>
                <p style="font-size: 1rem; color: #666;">Regular Ticket Price: {{ $event->regular_ticket_price }}</p>
            </div>
            <p style="font-size: 1rem; color: #666;">Max Attendees: {{ $event->max_attendees }}</p>
            <a href="{{ route('events.edit', $event->id) }}" style="font-size: 1rem; color: #3498db; text-decoration: none;">Edit Event</a>
        </div>
    </div>
</x-app-layout>
