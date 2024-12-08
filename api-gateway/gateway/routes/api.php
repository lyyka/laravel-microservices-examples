<?php

use App\Http\Controllers\GatewayController;
use Illuminate\Support\Facades\Route;

Route::get('/users-orders', GatewayController::class);
