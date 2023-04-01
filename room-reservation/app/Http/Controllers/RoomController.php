<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Http\Controllers\ReservationController;
use App\Traits\CanMakeReservation;
use Validator;
use DB;

class RoomController extends Controller
{
    use CanMakeReservation;

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

    public function indexAPI()
    {
        $rooms = Room::all();
        return $rooms;
    }

    // ONLY FOR API
    public function storeAPI(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'capacity' => 'required|integer',
            'handicap_accessible' => 'required|boolean',
            'wifi' => 'required|boolean',
            'whiteboard' => 'required|boolean',
            'room_no' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return "ERROR";
        }

        $validated = $validator->validated();
        $room = new Room();
        $room->capacity = $request->capacity;
        $room->handicap_accessible = $request->handicap_accessible;
        $room->wifi = $request->wifi;
        $room->whiteboard = $request->whiteboard;

        $room->save();

        return $room;
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
            'time' => 'required|date_format:H:i'
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
    start_time: Time
    end_time: Time
    date: Date

    */
    public function findRooms(Request $request) {
        $validator = validator()->make($request->all(), [
            'capacity' => 'integer',
            'handicap_accessible' => 'boolean',
            'whiteboard' => 'boolean',
            'wifi' => 'boolean',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i',
            'date' => 'Date'
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

        $rooms = DB::table('rooms')
            ->where('capacity', '>=', $capacity);

        if ($handicap_accessible) {
            $rooms = $rooms->where('handicap_accessible', '=', '1');
        }

        if ($whiteboard) {
            $rooms = $rooms->where('whiteboard', '=', '1');
        }

        if ($wifi) {
            $rooms = $rooms->where('wifi', '=', '1');
        }

        $rooms = $rooms->get();
        return $rooms;
        $availablerooms = [];
        foreach ($rooms as $room) {
            $open = $this->canMakeReservation($request, $room);
            if ($open) {
                $availablerooms.append($room);
            }
        }

        return view('makeReservation', [
            'rooms' => $availablerooms
        ]);
    }


    public function findRoomsAPI(Request $request) {
        $validator = validator()->make($request->all(), [
            'capacity' => 'integer',
            'handicap_accessible' => 'boolean',
            'whiteboard' => 'boolean',
            'wifi' => 'boolean',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i',
            'date' => 'Date'
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

        $rooms = DB::table('rooms')
            ->where('capacity', '>=', $capacity);

        if ($handicap_accessible) {
            $rooms = $rooms->where('handicap_accessible', '=', '1');
        }

        if ($whiteboard) {
            $rooms = $rooms->where('whiteboard', '=', '1');
        }

        if ($wifi) {
            $rooms = $rooms->where('wifi', '=', '1');
        }

        $rooms = $rooms->get();
        $availablerooms = [];
        
        foreach ($rooms as $room) {
            $open = $this->canMakeReservation($request, $room->id);
            if ($open) {
                array_push($availablerooms, $room);
            }
        }

        return $availablerooms;
    }

    public function getReservationsFromRoom($room_id) {
            $room = Room::findOrFail($room_id);
            $reservations = DB::table('reservations')
                ->where('id', '=', $room->reservation_id)
                ->get();
            return $reservations;
    }
}

/*

TO ADD: 

*/
