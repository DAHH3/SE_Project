<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="view" content = "width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="reservation.css">
    </head>
    
 <style>
.center { 
  margin-down: 10px;
  position: absolute;
  top: 50%;
  -ms-transform: translateX(-50%);
  transform: translateX(20%);
}

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
            <p></p>
            <br>
            <h1 align="center" style="font-family:Lucida Handwriting;">Welcome!</h1>
            <br>
            <p>
                <div class = "center">
                <button class = "btn1" onclick="window.location.href ='roomSearch.blade.php'">
                    MAKE A RESERVATION
                </button>
                <button class = "btn2" onclick="window.location.href ='findReservation.blade.php'">
                    VIEW CURRENT RESERVATION
                </button>
            </p>
        </div>

        <div class = "footer">
            <p></p>
        </div>

    </body>
</html>
