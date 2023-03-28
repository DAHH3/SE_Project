<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="view" content = "width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="reservation.css">
    </head>

    <body>


        <div class = "header">
            <h2 align="center">Continental</h2>
        </div>

        <div class="mid">
            <p></p>
            <br>
            <h1 align="center">Welcome!</h1>
            <br>
            <p>
                <button class = "button button" onclick="window.location.href ='roomSearch.blade.php'">
                    MAKE A RESERVATION
                </button>
                <button class = "button button" onclick="window.location.href ='findReservation.blade.php'">
                    VIEW CURRENT RESERVATION
                </button>
            </p>
        </div>

        <div class = "footer">
            <p></p>
        </div>

    </body>
</html>
