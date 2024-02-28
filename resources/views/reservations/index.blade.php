<x-app-layout>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>user_name</th>
                <th>user_email</th>
                <th>Ticket Type</th>
                <th>Event</th>
                <!-- Add other table headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td style="padding-left: 10px">{{ $reservation->user_name }}</td>
                    <td style="padding-left: 10px">{{ $reservation->user_email }}</td>
                    <td style="padding-left: 10px">{{ $reservation->ticket_type }}</td>
                    <td style="padding-left: 10px">{{ $reservation->event_title }}</td>
                    <!-- Add other table cells with reservation details as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
    
    

</x-app-layout>