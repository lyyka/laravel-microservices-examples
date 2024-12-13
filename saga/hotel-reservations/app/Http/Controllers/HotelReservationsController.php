<?php

namespace App\Http\Controllers;

use App\Models\HotelReservation;
use Illuminate\Http\JsonResponse;

class HotelReservationsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            HotelReservation::latest()->get()
        );
    }
}
