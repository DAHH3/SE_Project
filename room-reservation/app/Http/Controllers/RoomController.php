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
    isRoomOccupiedAtTime:

    Request = {
        date: Date
        time: Time
    }
    room_id = int

    Request should contain a date and time, function will return true if room is occupied and false if not

    Theoretically works :)
    */
    public function isRoomOccupiedAtTime(Request $request, $room_id) {
        $room = Room::findOrFail($room_id);

        $validator = validator()->make($request->all(), [
            'date' => 'required|date',
            'time' => 'required|time'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $date = $request->date;
        $time = $request->time;

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

    /*
    POSSIBLE ARGUMENTS:

    capacity: int
    handicap_accessible: bool
    whiteboard: bool
    wifi: bool

    */
    public function findRooms(Request $request) {
        $validator = validator()->make($request->all(), [
            'capacity' => 'integer',
            'handicap_accessible' => 'boolean',
            'whiteboard' => 'boolean',
            'wifi' => 'wifi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $capacity = $request->capacity;

        if (!$capacity) {
            $capacity = 0;
        }

        $handicap_accessible = $request->handicap_accessible;
        $whiteboard = $request->whiteboard;
        $wifi = $request->wifi;

        $rooms = DB::table('reservations')
            ->where('capacity', '>=', $capacity);

        if ($handicap_accessible) {
            $rooms = $rooms->where('handicap_accessible', '=', 'true');
        }

        if ($whiteboard) {
            $rooms = $rooms->where('whiteboard', '=', 'true');
        }

        if ($wifi) {
            $rooms = $rooms->where('wifi', '=', 'true');
        }

        return $rooms->get();
    }

    public function getReservationsFromRoom($room_id) {
            $room = Room::findOrFail($room_id);
            $rooms = DB::table('reservations')
                ->where('id', '=', $room->reservation_id)
                ->get();
            return $rooms;
    }
}

/*

TO ADD: 


*/
