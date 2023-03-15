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
  <h1>Available Rooms</h1>
  <br><br>
  <form action ="reservation_form.php" method="get">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="" required><br>
    <br>
    <br>
    <label for="pin">PIN:</label>
    <input type="text" id="pin" name="pin" value="" required><br>
  </form>

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