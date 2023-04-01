<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>findReservation</title>
    <link rel="stylesheet" href=" {{ asset('/css/reservation.css') }} ">
</head>
<body>

<div class = "header">
    <h2 align="center">MyBusinessName</h2>
</div>


<div class="mid">
    <p></p>
    <br>
    <h1 align="center">Find Reservation</h1>
    <br>
    <form action ="route('findReservation')" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="" required><br>
        <br>
        <br>
        <label for="pin">PIN:</label>
        <input type="text" id="pin" name="pin" value="" required><br>
    </form>

    <p>
        <button class = "button button" type="submit">
            Find
        </button>
    </p>

</div>

<div class = "footer">
    <p></p>
</div>

</body>
</html>