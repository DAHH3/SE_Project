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
  <h2 align="center" style="font-size:50px;">Continental</h2>
</div>

<div class="mid">
<div style="padding-left: 32%">
  <h1>Available Rooms</h1>
  <br><br>
  @if (count($posts) == 0)
    <p>No rooms available matching description</p>
  @endif
  <table>
    <thead>
      <tr>
        <td>Room Number</td>
        <!--how are we tracking availability-->
        <td>Availability</td>
      </tr>
    </thead>
    @foreach($post as $post)
      <tbody>
        <tr>
          <td>{{$post->room_id}}</td>
          <!--<td>{{$post->available}}</td>-->
          <!--figure out how to make it so it stores the selected input-->
          <td><form><input type="checkbox" id="select">
            </form></td>
        </tr>
      </tbody>

  </table>
  <p>
    <button class = "button button" onclick="window.location.href='makeReservation.blade.php'">
      Search
    </button>
  </p>
</div>

<div class = "footer">
  <p></p>
</div>


</body>
</html>
