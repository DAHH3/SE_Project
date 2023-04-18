@extends('layout')

@section('content')
    <h2>Search Rooms</h2>

    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    
    <form action ="/rooms/search" method="post">
        @csrf
        <table class="container">
            <tr>
                <th>Requirements</th>
                <th>Date/Time</th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="handicap_accessible" value="handicap_accessible" name="handicap_accessible">
                    <label for="handicap_accessible">Handicap Accessible</label>
                </td>
                <td>
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="wifi" value="wifi" name="wifi">
                    <label for="wifi">Wifi</label>
                </td>
                <td>
                    <label for="start_time">Start Time:</label>
                    <input type="time" id="start_time" name="start_time" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="whiteboard" value="whiteboard" name="whiteboard">
                    <label for="whiteboard">Whiteboard</label><br><br>
                </td>
                <td>
                    <label for="end_time">End Time:</label>
                    <input type="time" id="end_time" name="end_time" required />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" id="capacity" value="capacity" min="1" max="15" name="capacity">
                    <label for="capacity">Capacity</label>
                </td>
            </tr>
        </table>
        <button class = "button button" type="submit">
            Submit
        </button>
    </form>
@endsection
