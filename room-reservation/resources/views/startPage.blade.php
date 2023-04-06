<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="view" content = "width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="../../css/reservation.css">
    </head>
    
 <style>

.btn1{
	margin-right:100px
}

.btn2{
	margin-left:100px
}
</style>

    <body>


        <div class = "header">
            <h2 align="center" style="font-size:50px;">Continental</h2>
        </div>

        <div class="mid">
	    <h1>Welcome!</h1>
                <div class = "center">
                    <button class = "button button" onclick="window.location.href = `{{ route('roomSearchPage') }} `">
                    MAKE A RESERVATION
                    </button>
                    <button class = "button button" onclick="window.location.href =` {{ route('findReservationPage') }} `">
                    VIEW EXISTING RESERVATION
                    </button>
                </div>
        </div>

        <div class = "footer">
            <p></p>
        </div>

    </body>
</html>