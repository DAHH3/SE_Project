<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Room Search</title>
    <link rel="stylesheet" href="../../css/reservation.css">
</head>

<body>

<div class = "header">
    <h2 align="center" style="font-size:50px;">Continental</h2>
</div>


<div class="mid">
        <h1>Search Rooms</h1>
    <br><br>
    <div style = "overflow-y:auto;">
        <form action ="/rooms/search" method="post">
            @csrf
            <table>
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


            <!--
            <div class="left-column">
                <label for="resources"><b>Requirements</b></label><br>
                <input type="checkbox" id="handicap_accessible" value="handicap_accessible">
                <label for="handicap_accessible">Handicap Accessible</label><br>
                <input type="checkbox" id="wifi" value="wifi">
                <label for="wifi">Wifi</label><br>
                <input type="checkbox" id="whiteboard" value="whiteboard">
                <label for="whiteboard">Whiteboard</label><br><br>
                <input type="number" id="capacity" value="capacity" min="1" max="15">
                <label for="capacity">Capacity</label>
            </div>
            <div class="right-column">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required /><br><br>

                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" required /><br><br>

                <label for="end_time">End Time:</label>
                <input type="time" id="end_time" name="end_time" required /><br><br>
            -->
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <button class = "button button" type="submit">
                Submit
            </button>
        </form>
    </div>
</div>

<div class = "footer">
    <p></p>
</div>


</body>
</html>

