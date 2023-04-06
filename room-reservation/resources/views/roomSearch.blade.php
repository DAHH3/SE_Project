<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Room Search</title>
    <link rel="stylesheet" href="../../css/reservation.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>

<body>

<div class = "header">
    <h1>The Continental Library</h1>
</div>


<div class="body">
    <h2>Search Rooms</h2>
    
    <form action ="/rooms/search" method="post">
        @csrf
        <table class="container">
            <tr>
                <th>Requirements</th>
                <th>Date/Time</th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="handicap_accessible" value="handicap_accessible">
                    <label for="handicap_accessible">Handicap Accessible</label>
                </td>
                <td>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="wifi" value="wifi">
                    <label for="wifi">Wifi</label>
                </td>
                <td>
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="whiteboard" value="whiteboard">
                    <label for="whiteboard">Whiteboard</label><br><br>
                </td>
                <td>
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name="end_time" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" id="capacity" value="capacity" min="1" max="15">
                    <label for="capacity">Capacity</label>
                </td>
            </tr>
        </table>
        <button class = "button button" type="submit">
            Submit
        </button>
    </form>
</div>


</body>
</html>

