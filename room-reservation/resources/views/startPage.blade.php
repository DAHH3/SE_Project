<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="view" content = "width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href=" {{ asset('/css/reservation.css') }} ">
    </head>

    <body>


        <div class = "header">
            <h2 align="center">MyBusinessName</h2>
        </div>

        <div class="mid">
            <p></p>
            <br>
            <h1 align="center">Welcome!</h1>
            <br>
            <p>
                <button class = "button button" onclick="window.location.href = `{{ route('roomSearchPage') }} `">
                    MAKE A RESERVATION
                </button>
                <button class = "button button" onclick="window.location.href =` {{ route('findReservationPage') }} `">
                    VIEW CURRENT RESERVATION
                </button>
            </p>
        </div>

        <div class = "footer">
            <p></p>
        </div>

    </body>
</html>