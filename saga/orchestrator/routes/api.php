<?php

use App\Http\Controllers\SagaController;
use Illuminate\Support\Facades\Route;

Route::get('/saga', [SagaController::class, 'index']);
Route::post('/saga', [SagaController::class, 'store']);
