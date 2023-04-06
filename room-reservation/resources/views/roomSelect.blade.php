<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Room Selection</title>
    <link rel="stylesheet" href="../../css/reservation.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>

<div class = "header">
    <h1>The Continental Library</h1>
</div>

<div class = "body">
    <h2>Select Room</h2>

    @if (count($rooms) == 0)
        <p>There were no rooms matching your search.</p>
    @endif
    @foreach($rooms as $room)
        <form action ="/reservations/create" method="post" class="container">
        @csrf
            <input type="hidden" name="room_id" value="{{ $room->id}} ">
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="start_time" value="{{ $start_time }}">
            <input type="hidden" name="end_time" value="{{ $end_time }}">
            <table>
                <tr>
                    <th>Room {{ $room->id }}</th>
                </tr>
                <tr>
                    <td>Capacity: {{ $room->capacity }}</td>
                </tr>
                @if ($room->wifi)
                    <tr>
                        <td>&#10003; Wifi Access</td>
                    </tr>
                @endif
                @if ($room->handicap_accessible)
                    <tr>
                        <td>&#10003; Handicap Accessible</td>
                    </tr>
                @endif
                @if ($room->whiteboard)
                    <tr>
                        <td>&#10003; Whiteboard Available</td>
                    </tr>
                @endif
            </table>
            <button class = "button button" type="submit">
                Book
            </button>
        </form>
    @endforeach

</div>

</body>
</html>