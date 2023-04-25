<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>The Continential Library</title>
    <!-- FOR AWS -->
    <!--<link rel="stylesheet" href="../../../room-reservation/public/css/reservation.css">-->
    <link rel="stylesheet" href="../../css/reservation.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>

<div class = "header">
    <h1><a href="{{ route('startPage') }}">The Continental Library</a></h1>
</div>

<div class="body">
    @yield('content')
</div>
</body>
</html>