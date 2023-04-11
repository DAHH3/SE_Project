<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="view" content = "width=device-width, initial-scale=1">
    <title>Find Reservation</title>
    <link rel="stylesheet" href="../../css/reservation.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>

<div class = "header">
    <h1>The Continental Library</h1>
</div>

<div class="body">
    <h2>Find Reservation</h2>
    <form action ="/reservations/search" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                <td>
                    <input type="text" id="email" name="email" value="" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pin">PIN:</label>
                </td>
                <td>
                    <input type="text" id="pin" name="pin" value="" required>
                </td>
            </tr>
        </table>

        <button class = "button button" type="submit">
            Find
        </button>
    </form>

</div>

</body>
</html>