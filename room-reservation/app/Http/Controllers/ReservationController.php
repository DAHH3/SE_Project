<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.modify', [
            'edit' => false
        ]);
    }

    /*

    Request = {
        date: Date
        start_time: Time
        end_time: Time
    }
    room_id = int

    Request should contain a date, start_time, and end_time. Will return true if reservation is possible and false if not.

    */
    public function canMakeReservation(Request $request, $room_id) {
        $room = Room::findOrFail($room_id);

        $validator = validator()->make($request->all(), [
            'date' => 'required|date',
            'start_time' => 'required|time',
            'end_time' => 'required|time'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $date = $validated->date;
        $start_time = $validated->start_time;
        $end_time = $validated->end_time;

        $reservation = DB::table('reservations')
            ->where('date', '=', $date)
            ->orWhere(function(Builder $query) {
                $query->where('start_time', '>=', $start_time)
                    ->where('start_time', '<', $start_time);
            })
            ->orWhere(function(Builder $query) {
                $query->where('end_time', '<=', $end_time)
                    ->where('start_time', '>', $end_time);
            })
            ->where('room_id', '=', $room_id)
            ->first();
        
        if ($reservation) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'room_id' => 'required|integer|exists:rooms,id',
            'email' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $reservation = new Reservation();
        $reservation->email = $validated['email'];
        $reservation->date = $validated['date'];
        $reservation->start_time = $validated['start_time'];
        $reservation->end_time = $validated['end_time'];
        $reservation->pin = $validated['pin'];

        $open = canMakeReservation($request, $room);

        if ($open) {
            $room = Room::findOrFail($request->room_id);
            $reservation->room()->associate($room);

            $reservation->save();
            return redirect()->route('reservationsShow', $reservation->id);
        }
        else {
            return redirect()->back()->withErrors('Room already reserved during that time');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        return view('reservations.show', [
            'reservation' => $reservation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* RIGHT NOW WE ARE NOT DOING THIS BUT I WROTE THIS LOVELY CODE SO WE WILL KEEP IT FOR A BIT

    public function update(Request $request, $reservation_id)
    {
        $validator = validator()->make($request->all(), [
            'room_id' => 'required|integer|exits:rooms,id',
            'email' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|time',
            'end_time' => 'required|time',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->email = $validated['email'];
        $reservation->date = $validated['date'];
        $reservation->start_time = $validated['start_time'];
        $reservation->end_time = $validated['end_time'];
        $reservation->pin = $validated['pin'];

        $room = Room::find($request->room_id);
        $reservation->room()->dissociate();
        $reservation->room()->associate($room);

        $reservation->save();
        return redirect()->route('reservationsShow', $reservation->id);
    }

    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->room()->dissociate();
        $reservation->delete();

        return redirect()->route('roomsIndex');
    }

    public function findReservation(Request $request) {
        $validator = validator()->make($request->all(), [
            'email' => 'required|string',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $email = $validated->email;
        $pin = $validated->pin;

        $reservation = DB::table('reservations')
            ->where('email', '=', $email)
            ->where('pin', '=', $pin)
            ->first();

        return $reservation;
    }

    public function getRoomFromReservation($reservation_id) {
        $reservation = Reservation::findOrFail($reservation_id);
        $room = DB::table('rooms')
            ->where('id', '=', $reservation->room_id)
            ->first();
        return $room;
    }
}

/*

*/
