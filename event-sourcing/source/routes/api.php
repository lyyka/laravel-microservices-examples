<?php

use Illuminate\Support\Facades\Route;

Route::post('/create-user', [\App\Http\Controllers\EventSourcingController::class, 'createUser']);
Route::get('/list-events', [\App\Http\Controllers\EventSourcingController::class, 'listEvents']);
Route::get('/list-users', [\App\Http\Controllers\EventSourcingController::class, 'listUsers']);
Route::delete('/clear-database', [\App\Http\Controllers\EventSourcingController::class, 'clearDatabase']);
Route::post('/rebuild-from-events', [\App\Http\Controllers\EventSourcingController::class, 'rebuildFromEvents']);
