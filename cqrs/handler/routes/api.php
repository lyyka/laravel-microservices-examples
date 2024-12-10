<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders/average', [\App\Http\Controllers\OrderAnalyticsController::class, 'avgAmount']);
Route::get('/users/count', [\App\Http\Controllers\UserAnalyticsController::class, 'count']);
