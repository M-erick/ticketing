
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Events') }}
        </h2>
    </x-slot>
    <style>
        /* styles.css */

.form-container {
    margin: 20px;
    padding: 20px;
    border-radius: 10px;
    background-color: #f0f0f0;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
}

.form-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
}

.form-button {
    background-color: #3498db;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
   <div class="form-container">
    <form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="image">Event Image:</label>
        <input type="file" id="image" name="image" class="form-input">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required class="form-input">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required class="form-input">

        <label for="description">Description:</label>
        <textarea id="description" name="description" required class="form-textarea"></textarea>

        <label for="start_datetime">Start Date and Time:</label>
        <input type="datetime-local" id="start_datetime" name="start_datetime" required class="form-input">

        <label for="end_datetime">End Date and Time:</label>
        <input type="datetime-local" id="end_datetime" name="end_datetime" required class="form-input">

        <label for="vip_ticket_price">VIP Ticket Price:</label>
        <input type="number" id="vip_ticket_price" name="vip_ticket_price" step="0.01" required class="form-input">

        <label for="regular_ticket_price">Regular Ticket Price:</label>
        <input type="number" id="regular_ticket_price" name="regular_ticket_price" step="0.01" required class="form-input">

        <label for="max_attendees">Max Attendees:</label>
        <input type="number" id="max_attendees" name="max_attendees" required class="form-input">

        <button type="submit" class="form-button">Create Event</button>
    </form>
</div>
</x-app-layout>