<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\CanMakeReservation;
use DB;
use Validator;

class ReservationController extends Controller
{
    use CanMakeReservation;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexAPI()
    {
        $reservations = Reservation::all();
        return $reservations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $room = Room::findOrFail($request->room_id);
        return view('makeReservation', [
            'room' => $room,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
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
            'room_id' => 'required|integer|exists:rooms,id',
            'email' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $validated = $validator->validated();
        $reservation = new Reservation();
        $reservation->email = $validated['email'];
        $reservation->date = $validated['date'];
        $reservation->start_time = $validated['start_time'];
        $reservation->end_time = $validated['end_time'];
        $reservation->pin = $validated['pin'];

        $open = $this->canMakeReservation($request, $request->room_id);

        if ($open) {

            $room = Room::findOrFail($request->room_id);

            if (!$room) {
                return 'Room does not exist';
            }
            $reservation->room()->associate($room);

            $reservation->save();
            return redirect()->route('reservationShow', $reservation->id);
        }
        else {
            return redirect()->back()->withErrors('Room already reserved during that time');
        }
    }

    public function storeAPI(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'room_id' => 'required|integer|exists:rooms,id',
            'email' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $validated = $validator->validated();
        $reservation = new Reservation();
        $reservation->email = $validated['email'];
        $reservation->date = $validated['date'];
        $reservation->start_time = $validated['start_time'];
        $reservation->end_time = $validated['end_time'];
        $reservation->pin = $validated['pin'];

        $open = $this->canMakeReservation($request, $request->room_id);

        if ($open) {

            $room = Room::findOrFail($request->room_id);

            if (!$room) {
                return 'Room does not exist';
            }
            $reservation->room()->associate($room);

            $reservation->save();
            return $reservation;
        }
        else {
            return 'Room already reserved during that time';
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
        return view('reservationInformation', [
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
    public function destroy(Request $request)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);
        $reservation->room()->dissociate();
        $reservation->delete();

        return view('startPage');
    }

    public function destroyAPI(Request $request, $reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        $reservation->room()->dissociate();
        $reservation->delete();

        return 'Deleted!';
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
        $email = $request->email;
        $pin = $request->pin;

        $reservation = DB::table('reservations')
            ->where('email', '=', $email)
            ->where('pin', '=', $pin)
            ->first();

        return view('reservationInformation', [
            'reservation' => $reservation
        ]);
    }

    public function findReservationAPI(Request $request) {
        $validator = validator()->make($request->all(), [
            'email' => 'required|string',
            'pin' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $email = $request->email;
        $pin = $request->pin;

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
