<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Guest Reservation Notification</title>
</head>

<body>
    <h1>New Guest Reservation Notification</h1>
    <p>Hello {{ $superadminName }},</p>
    <p>A new guest reservation request has been made. Here are the details:</p>

    <ul>
        <li><strong>Guest Name:</strong> {{ $data['guest_name'] }}</li>
        <li><strong>Room Name:</strong> {{ $data['room_name'] }}</li>
        <li><strong>Reservation Date:</strong> {{ $data['reservation_date'] }}</li>
        <li><strong>Reservation Time:</strong> {{ $data['reservation_time'] }}</li>
        <li><strong>End of Reservation:</strong> {{ $data['timelimit'] }}</li>
        <li><strong>Guest's Department:</strong> {{$data['department']}}</li>
        <li><strong>Guest's Contact:</strong>{{$data['Contact']}}</li>
        <li><strong>Event:</strong> {{$data['event']}}</li>
        <li><strong>Comments</strong>{{$data['Comments']}}</li>
        <li><strong>Meal SetUp Details</strong>: <span>{{$data['MealDetails']}}</span></li>

        


        <!-- Add more reservation details as needed -->
    </ul>
    <p>
        To approve this reservation, please log in to the admin panel.
        <!-- Add a link to your admin panel -->
    </p>

    <p>Thank you for using our reservation system.</p>
    <p>For any inquiries, please contact us at <a href="ilabsupport@strathmore.edu">ilabsupport@strathmore.edu</a></p>

    <p>To access the system, please use this link: <strong><a href="https://shaba.strathmore.edu/">https://shaba.strathmore.edu/</a></strong></p>


    <!-- Email Footer -->


    <p>Best regards,<br>iLab Room Booking System</p>
    
    <p>© 2023 Strathmore. All rights reserved.</p>

</body>

</html>