<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="view" content = "width=device-width, initial-scale=1">
  <title>Find Reservation</title>
  <link rel="stylesheet" href="reservation.css">
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


<div class="mid">
<div style="padding-left: 35%">
  <h1>Find Reservation</h1>
  </div>
  <h3>Room: </h3>
  
   <label for="date"><b>Date:</b></label><br>
    <input type="date" id="start" name="trip-start">
    <br>
    <br>
     <label for="appt"><b>Time:</b></label><br>
     <input type="time" id="appt" name="appt" required>
  

  <br>
  <!--  /*TODO: Add Delete Message to delete button*/-->
  <p>
    <button class = "btn1" onclick="window.location.href ='startPage.blade.php'">
      Delete
    </button>
    <button class = "button button" onclick="window.location.href ='startPage.blade.php'">
      Home
    </button>
  </p>
</div>

<div class = "footer">
  <p></p>
</div>


</body>
</html>
