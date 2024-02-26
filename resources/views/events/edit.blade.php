<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div style="margin: 20px; padding: 20px; border-radius: 10px; background-color: #f0f0f0;">
        <form method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label for="image">Event Image:</label>
                <input type="file" id="image" name="image" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $event->title }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="{{ $event->location }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">{{ $event->description }}</textarea>
            </div>
           

            <div style="margin-bottom: 20px;">
                <label for="start_datetime">Start Date and Time:</label>
                <input type="datetime-local" id="start_datetime" name="start_datetime" value="{{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d\TH:i')}}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="end_datetime">End Date and Time:</label>
                <input type="datetime-local" id="end_datetime" name="end_datetime" value="{{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d\TH:i') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="vip_ticket_price">VIP Ticket Price:</label>
                <input type="number" id="vip_ticket_price" name="vip_ticket_price" step="0.01" value="{{ $event->vip_ticket_price }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="regular_ticket_price">Regular Ticket Price:</label>
                <input type="number" id="regular_ticket_price" name="regular_ticket_price" step="0.01" value="{{ $event->regular_ticket_price }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="max_attendees">Max Attendees:</label>
                <input type="number" id="max_attendees" name="max_attendees" value="{{ $event->max_attendees }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div>
                <button type="submit" style="background-color: #3498db; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Update Event</button>
            </div>
        </form>
    </div>
</x-app-layout>
