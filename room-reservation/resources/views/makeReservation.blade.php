@extends('layout')

@section('content')
    <h2>Make Reservation</h2>

    <div class="container">
      <table>
        <tr>
          <th colspan="2">Reservation</th>
        </tr>
        <tr>
          <td>Room:</td>
          <td>{{$room->id}}</td>
        </tr>
        <tr>
          <td>Date:</td>
          <td>{{$date}}</td>
        </tr>
        <tr>
          <td>Time:</td>
          <td>{{$start_time}} to {{$end_time}}</td>
        </tr>
      </table>
    </div>

    <div class="container">
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
    </div>

  <form action ="/reservations" method="post">
    @csrf
    <input type="hidden" name="room_id" value="{{ $room->id }}">
    <input type="hidden" name="date" value="{{ $date }}">
    <input type="hidden" name="start_time" value="{{ $start_time }}">
    <input type="hidden" name="end_time" value="{{ $end_time }}">
    <table>
        <tr>
            <td>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="" required>
            </td>
            <td>
                <label for="pin">PIN:</label>
                <input type="text" id="pin" name="pin" value="" required>
            </td>
        </tr>
    </table>

    <button class = "button button" type="submit">
      Create
    </button>
  </form>
  
@endsection