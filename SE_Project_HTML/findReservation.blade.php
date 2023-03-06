<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>findReservation</title>
    <link rel="stylesheet" href="reservation.css">
</head>
<body>

<div class = "header">
    <h2 align="center">MyBusinessName</h2>
</div>


<div class="mid">
    <p></p>
    <br>
    <h1 align="center">Reservation Check</h1>
    <br>
    <p>
        <h2>
            Email: <label>
                <input type="text" name="user_email">
            </label> <br>
        </h2>
    </p>



    <p>
        <h2>
            Pin: <label>
                <input type="text" name="user_pin">
            </label> <br>
        </h2>
    </p>


        <p >
            <button class = "button button" onclick="window.location.href='reservationInformation.blade.php'">
                Find
            </button>
        </p>

</div>

<div class = "footer">
    <p></p>
</div>

</body>
</html>