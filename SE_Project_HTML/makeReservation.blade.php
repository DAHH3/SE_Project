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
    <p>
        "Hello"
    </p>
</div>

<div class = "header">
    <h2 align="center">MyBusinessName</h2>
</div>


<div class="mid">
    <div style="padding-left: 45%">
        <h1>Make a Reservation</h1>
    </div>
    <br><br>
    <p>

    </p>


    <div class="right-column">
        <label for="resources">Resources Available:</label>
        <select id="resources" multiple>
            <option value="whiteboard">Capacity</option>
            <option value="computer">Handicap Accessible</option>
            <option value="whiteboard">Capacity</option>            <option value="computer">Wifi</option>
            <option value="whiteboard">Whiteboard</option>

        </select>
    </div>

    <div style = "overflow-y:auto;">

        <form action ="reservation_form.php" method="get">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="" required><br>
            <br>
            <br>

            <label for="start_time">Start date and time:</label><br>
            <input type="datetime-local" id="start_time" name="start_time" required/>
            <br>
            <br>
            <br>
            <label for="end_time">End date and time:</label><br>
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