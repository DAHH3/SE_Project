<?php

namespace App\Traits;

use DB;
use Illuminate\Http\Request;

trait CanMakeReservation {
    public function canMakeReservation(Request $request, $room_id) {
        $room = DB::table('rooms')
            ->where('id', '=', $room_id)
            ->first();

        if (!$room) {
            return redirect()->back()->withErrors("Room does not exist");
        }

        $validator = validator()->make($request->all(), [
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        $reservation = DB::table('reservations')
            ->where(function($query) use($request, $room_id) {
                $query->where('start_time', '>=', $request->start_time)
                    ->where('start_time', '<=', $request->end_time)
                    ->where('date', '=', $request->date)
                    ->where('room_id', '=', $room_id);
            })
            ->orWhere(function($query) use($request, $room_id) {
                $query->where('end_time', '<=', $request->end_time)
                    ->where('end_time', '>=', $request->start_time)
                    ->where('date', '=', $request->date)
                    ->where('room_id', '=', $room_id);;
            })
            ->orWhere(function($query) use($request, $room_id) {
                $query->where('start_time', '<=', $request->start_time)
                    ->where('end_time', '>=', $request->end_time)
                    ->where('date', '=', $request->date)
                    ->where('room_id', '=', $room_id);;
            })
            ->first();
        
        if ($reservation) {
            return false;
        }
        else {
            return true;
        }
    }
}