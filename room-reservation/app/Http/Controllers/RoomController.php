<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('rooms.show', [
            'room' => $room
        ]);
    }

    /*
    isRoomOccupied:

    Request = {
        date: Date
        time: Time
    }
    room_id = int

    Request should contain a date and time, function will return true if room is occupied and false if not

    Theoretically works :)
    */
    public function isRoomOccupied(Request $request, $room_id) {
        $room = Room::findOrFail($room_id);

        $validator = validator()->make($request->all(), [
            'date' => 'required|date',
            'time' => 'required|time'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $date = $validated->date;
        $start_time = $validated->time;

        $reservation = DB::table('reservations')
            ->where('date', '=', $date)
            ->where('start_time', '<=', $time)
            ->where('end_time', '>=', $time)
            ->where('room_id', '=', $room_id)
            ->first();
        
        if ($reservation) {
            return true;
        }
        else {
            return false;
        }
    }
}

/*

TO ADD: 

-> Return rooms that match specified parameters

*/
