@extends('layout')

@section('content')
  <h2>Reservation Information</h2>

  @if ($reservation)

    <div class="container">
      <table>
        <tr>
          <th colspan="2">Reservation</th>
        </tr>
        <tr>
          <td>Room:</td>
          <td>{{$room_no}}</td>
        </tr>
        <tr>
          <td>Date:</td>
          <td>{{$reservation->date}}</td>
        </tr>
        <tr>
          <td>Time:</td>
          <td>{{$reservation->start_time}} to {{$reservation->end_time}}</td>
        </tr>
      </table>
    </div>
  
    <!--  /*TODO: Add Delete Message to delete button*/-->
    <form action="/reservations/delete" method="post">
      @csrf
      <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
      <button class = "button button" type="submit">
        Delete
      </button>
      <button type="button" class = "button button" onclick="window.location.href =` {{ route('startPage') }} `">
        Home
      </button>
    </form>
  @endif
  @if (!$reservation)
    <p>No matching reservations could be found.</p>
    <button class = "button button" onclick="window.location.href =` {{ route('startPage') }} `">
      Home
    </button>
  @endif
@endsection
