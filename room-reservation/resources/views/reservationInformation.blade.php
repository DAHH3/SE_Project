@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="view" content = "width=device-width, initial-scale=1">
  <title>Reservation Information</title>
  <link rel="stylesheet" href="../../css/reservation.css">
</head>

<style>
.btn1{
	margin-right:50px
}
</style>


<body>

<div class = "header">
  <h2 align="center"style="font-size:50px;">Continental</h2>
</div>

<div class="mid" style="padding-left: 35%">
  <h1>Find Reservation</h1>
  </div>
  @if ($reservation)
  <h3>Room: {{$reservation->room_id}}</h3>
  <br>
    <h3>Date: {{$reservation->date}}</h3><br>
    <br>
     <h3>Time: {{$reservation->start_time}} to {{$reservation->end_time}}</h3><br>
  

  <br>
  <!--  /*TODO: Add Delete Message to delete button*/-->
  <p>
    <form action="/reservations/delete" method="post">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <button class = "button button" type="submit">
          Delete
        </button>
    </form>
    @endif
    @if (!$reservation)
    <p>No matching reservations could be found.</p>
    @endif
    <button class = "button button" onclick="window.location.href =` {{ route('startPage') }} `">
      Home
    </button>
    </p>
</div>
<div class = "footer">
  <p></p>
</div>


</body>
</html>
