<?php

use App\Http\Controllers\FlightReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/reservations', [FlightReservationController::class, 'index']);
