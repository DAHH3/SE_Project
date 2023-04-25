@extends('layout')

@section('content')
    <h2>Search Rooms</h2>

    <form action ="rooms/search" method="post">
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
                    <input class="@error('date') error-field @enderror" type="date" id="date" name="date" required />
                    @error('date')
                        <br><span class="error-message" role="alert">
                                {{ $message }} 
                        </span>
                    @enderror
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
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="whiteboard" value="whiteboard" name="whiteboard">
                    <label for="whiteboard">Whiteboard</label><br><br>
                </td>
                <td>
                    <label for="end_time">End Time:</label>
                    <input class="@error('end_time') error-field @enderror" type="time" id="end_time" name="end_time" required />
                    @error('end_time')
                        <br><span class="error-message" role="alert">
                                {{ $message }} 
                        </span>
                    @enderror
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
