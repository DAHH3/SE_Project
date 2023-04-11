<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="view" content = "width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="../../css/reservation.css">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
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
            <h1>The Continental Library</h1>
        </div>

        <div class="body">
	        <h2>Welcome!</h2>
            <button class = "button button" onclick="window.location.href = `{{ route('roomSearchPage') }} `">
                MAKE RESERVATION
            </button>
            <button class = "button button" onclick="window.location.href =` {{ route('findReservationPage') }} `">
                FIND RESERVATION
            </button>
        </div>

    </body>
</html>