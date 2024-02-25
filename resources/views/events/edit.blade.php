
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $event->title }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $event->description }}</textarea>

        <label for="start_datetime">Start Date and Time:</label>
        <input type="datetime-local" id="start_datetime" name="start_datetime" value="{{ $event->start_datetime->format('Y-m-d\TH:i') }}" required>

        <label for="end_datetime">End Date and Time:</label>
        <input type="datetime-local" id="end_datetime" name="end_datetime" value="{{ $event->end_datetime->format('Y-m-d\TH:i') }}" required>

        <label for="vip_ticket_price">VIP Ticket Price:</label>
        <input type="number" id="vip_ticket_price" name="vip_ticket_price" step="0.01" value="{{ $event->vip_ticket_price }}" required>

        <label for="regular_ticket_price">Regular Ticket Price:</label>
        <input type="number" id="regular_ticket_price" name="regular_ticket_price" step="0.01" value="{{ $event->regular_ticket_price }}" required>

        <label for="max_attendees">Max Attendees:</label>
        <input type="number" id="max_attendees" name="max_attendees" value="{{ $event->max_attendees }}" required>

        <button type="submit">Update Event</button>
    </form>
</x-app-layout>