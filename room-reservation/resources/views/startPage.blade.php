@extends('layout')

@section('content')
	<h2>Welcome!</h2>
    <button class = "button button" onclick="window.location.href = `{{ route('roomSearchPage') }} `">
        MAKE RESERVATION
    </button>
    <button class = "button button" onclick="window.location.href =` {{ route('findReservationPage') }} `">
        FIND RESERVATION
    </button>
@endsection