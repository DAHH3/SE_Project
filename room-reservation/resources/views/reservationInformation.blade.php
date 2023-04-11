@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="view" content = "width=device-width, initial-scale=1">
  <title>Reservation Information</title>
  <link rel="stylesheet" href="../../css/reservation.css">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>

<style>
.btn1{
	margin-right:50px
}
</style>


<body>

<div class = "header">
  <h1>The Continental Library</h1>
</div>

<div class="body">
  <h2>Reservation Information</h2>

  @if ($reservation)

    <div class="container">
      <table>
        <tr>
          <th colspan="2">Reservation</th>
        </tr>
        <tr>
          <td>Room:</td>
          <td>{{$reservation->room_id}}</td>
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
      <button class = "button button" onclick="window.location.href =` {{ route('startPage') }} `">
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
</div>


</body>
</html>
