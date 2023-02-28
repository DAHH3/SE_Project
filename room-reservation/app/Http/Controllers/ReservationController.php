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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $reservation = new Reservation();
        $reservation->email = $validated['email'];
        $reservation->date = $validated['date'];
        $reservation->start_time = $validated['start_time'];
        $reservation->end_time = $validated['end_time'];
        $reservation->pin = $validated['pin'];

        $room = Room::find($request->room_id);
        $reservation->room()->associate($room);

        $reservation->save();
        return redirect()->route('reservationsShow', $reservation->id);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $reservation_id)
    {
        return view('reservations.modify', [
            'edit' => true,
            'reservation' => Reservation::findOrFail($reservation_id)
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
}

/*

TO ADD:

-> Creating reservation should NOT be allowed if one already exists for that time
-> Get room from reservation?

*/
