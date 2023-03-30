<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// WORKS
Route::get('/rooms', [RoomController::class, 'indexAPI']);

// WORKS
Route::get('/reservations', [ReservationController::class, 'indexAPI']);

// WORKS
Route::post('/rooms/{room_id}/occupied', [RoomController::class,'isRoomOccupiedAtTime']);

// WORKS
Route::post('/rooms/find', [RoomController::class, 'findRoomsAPI']);

// WORKS
Route::post('/rooms/{room_id}/reserve', [ReservationController::class, 'canMakeReservation']);

// WORKS
Route::post('/rooms', [RoomController::class, 'storeAPI']);

// WORKS
Route::post('/reservations', [ReservationController::class, 'storeAPI']);

// WORKS
Route::delete('/reservations/{room_id}', [ReservationController::class, 'destroyAPI']);

// WORKS
Route::post('/reservations/find', [ReservationController::class, 'findReservationAPI']);

// WORKS
Route::get('/reservations/{reservation_id}/room', [ReservationController::class, 'getRoomFromReservation']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
