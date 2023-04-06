<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>findReservation</title>
    <link rel="stylesheet" href="../../css/reservation.css">
</head>
<body>

<div class = "header">
    <h2 align="center" style="font-size:50px;">Continental</h2>
</div>

<div class="mid">
    <p></p>
    <div style="padding-left: 35%">
    <h1>Find Reservation</h1>
    </div>
    <br>
    <form action ="/reservations/search" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="" required><br>
        <br>
        <br>
        <label for="pin">PIN:</label>
        <input type="text" id="pin" name="pin" value="" required><br>
        <button class = "button button" type="submit">
            Find
        </button>
    </form>

</div>

<div class = "footer">
    <p></p>
</div>

</body>
</html>