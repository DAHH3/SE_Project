<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//TODO: FILL IN NAMES WITH NAMES OF BLADE FILES

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reservations/search', function() {
    return view('NAME HERE');
});

Route::get('/rooms/search', function() {
    return view('NAME HERE');
});

Route::post('/reservations/search', [ReservationController::class, 'findReservation']);

Route::post('/reservations', [ReservationController::class, 'store']);

Route::get('/reservations/create', [ReservationController::class, 'create']);

Route::get('/{reservation_id}', [ReservationController::class, 'show']);

Route::delete('/{reservation_id}', [ReservationController::class, 'destroy']);

Route::post('/rooms/search', [RoomController::class, 'findRooms']);


