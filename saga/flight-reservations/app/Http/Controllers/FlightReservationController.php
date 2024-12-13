<?php

namespace App\Http\Controllers;

use App\Models\FlightReservation;
use Illuminate\Http\JsonResponse;

class FlightReservationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            FlightReservation::latest()->get()
        );
    }
}
