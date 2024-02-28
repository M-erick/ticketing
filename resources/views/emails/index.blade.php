<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
</head>
<body>

    
    <p>Dear {{ $userName }},</p>

    <p>Thank you for booking a ticket for the event "{{ $eventTitle }}".</p>

    <p>Your booking details:</p>
    <ul>
        <li>Event Title: {{ $eventTitle }}</li>
        <li>User Name: {{ $userName }}</li>
        <li>Ticket Type: {{ $ticketType }}</li>
    </ul>

    <p>Feel free to contact us if you have any questions or concerns.</p>

    <p>Best regards,</p>
    <p>Your Ticketing System Team</p>
</body>
</html>
