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

Route::get('/', function () {
    return view('startPage');
})->name('startPage');

Route::get('/reservations', function() {
    return view('findReservation');
})->name('findReservationPage');

Route::get('/rooms', function() {
    return view('roomSearch');
})->name('roomSearchPage');

Route::post('/reservations/search', [ReservationController::class, 'findReservation'])->name('findReservation');

Route::post('reservations', [ReservationController::class, 'store'])->name('makeReservation');

Route::post('/reservations/create', [ReservationController::class, 'create'])->name('makeReservation');

Route::get('/reservations/{reservation_id}', [ReservationController::class, 'show'])->name('reservationShow');

Route::post('/reservations/delete', [ReservationController::class, 'destroy'])->name('deleteReservation');

Route::post('/rooms/search', [RoomController::class, 'findRooms'])->name('roomSearch');



