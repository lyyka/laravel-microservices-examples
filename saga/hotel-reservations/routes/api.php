<?php

use App\Http\Controllers\HotelReservationsController;
use Illuminate\Support\Facades\Route;

Route::get('/reservations', [HotelReservationsController::class, 'index']);
