@extends('layout')
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

@section('content')
<div class="mid">
<div style="padding-left: 35%">
  <h1>Find Reservation</h1>
  </div>
  <h3>Room: {{$post->room_id}}</h3>
  <br>
    <h3>Date: {{$post->date}}</h3><br>
    <br>
     <h3>Time: {{$post->start_time}} to {{$post->end_time}}</h3><br>

  

  <br>
  <!--  /*TODO: Add Delete Message to delete button*/-->
  <p>
    <form action="{{ route('postsDestroy', ['post_id' => $post->id]) }}" method="post">
        @csrf
        @method('delete')
    <button class = "btn1" onclick="window.location.href ='startPage.blade.php'">
      Delete
    </button>
    </form>
    <button class = "button button" onclick="window.location.href ='startPage.blade.php'">
      Home
    </button>
  </p>
</div>
@endsection
<div class = "footer">
  <p></p>
</div>


</body>
</html>

