<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Make Reservation</title>
    <link rel="stylesheet" href="reservation.css">
</head>

<body>
<div class="left-column">
    
</div>

<div class = "header">
    <h2 align="center" style="font-size:50px;">Continental</h2>
</div>


<div class="mid">
    <div style="padding-left: 32%">
        <h1>Make a Reservation</h1>
    </div>
    <br><br>
    <p>
    </p>


    <div class="right-column">
        <label for="resources"><b>Resources Available:</b></label><br>
        <!--TODO:Make capacity this a range-->
            <input type="checkbox" id="capacity" value="capacity">
            <label for="capacity">Capacity</label>
            <input type="checkbox" id="accessibility" value="accessibility">
            <label for="accessibility">Handicap Accessible</label>
            <input type="checkbox" id="wifi" value="wifi">
            <label for="wifi">Wifi</label>
            <input type="checkbox" id="whiteboard" value="whiteboard">
            <label for="whiteboard">Whiteboard</label>
    </div>

    <div style = "overflow-y:auto;">

        <form action ="reservation_form.php" method="get">
            <label for="email"><b><br>Email:</b></label><br>
            <input type="text" id="email" name="email" value="" required><br>
            <br>
            

            <label for="start_time"><b>Start date and time:</b></label><br>
            <input type="datetime-local" id="start_time" name="start_time" required/>
            <br>
            <br>
            
            <label for="end_time"><b>End date and time:</b></label><br>
            <input type="datetime-local" id="end_time" name="end_time" required/>
            <br>
            <br>
            <br>
            
        </form>
        <div style="padding-left: 50%">

            <button class = "button button" onclick="window.location.href='reservationInformation.blade.php'">
                Submit
            </button>
        </div>
    </div>
</div>

<div class = "footer">
    <p></p>
</div>


</body>
</html>
