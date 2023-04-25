@extends('layout')

@section('content')
    <h2>Find Reservation</h2>
    <form action ="reservations/search" method="post">
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
@endsection