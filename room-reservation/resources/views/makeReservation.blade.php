<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Make Reservation</title>
    <link rel="stylesheet" href="../../css/reservation.css">
</head>
<body>

<div class = "header">
    <h2 align="center" style="font-size:50px;">Continental</h2>
</div>


<div class="mid">
    <p></p>
    <div style="padding-left: 35%">
    <h1>Make Reservation</h1>
    </div>

    <div>
            <h3>Room {{ $room->id }}</h3>
            <hr>
            <p>Capacity: {{ $room->capacity }}</p>
            @if ($room->wifi)
                <p>Wifi Access</p>
            @endif
            @if ($room->handicap_accessible)
                <p>Handicap Accessible</p>
            @endif
            @if ($room->whiteboard)
                <p>Whiteboard Available
            @endif
        </div>

    <br>
  <form action ="/reservations" method="post">
    @csrf
    <input type="hidden" name="room_id" value="{{ $room->id }}">
    <input type="hidden" name="date" value="{{ $date }}">
    <input type="hidden" name="start_time" value="{{ $start_time }}">
    <input type="hidden" name="end_time" value="{{ $end_time }}">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="" required><br>
    <br>
    <br>
    <label for="pin">PIN:</label>
    <input type="text" id="pin" name="pin" value="" required><br>
    <button class = "button button" type="submit">
      Create
    </button>
  </form>

</div>

<div class = "footer">
    <p></p>
</div>

</body>
</html>