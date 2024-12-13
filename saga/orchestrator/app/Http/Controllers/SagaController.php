<?php

namespace App\Http\Controllers;

use App\Jobs\MakeFlightReservation;
use App\Jobs\MakeHotelReservation;
use App\Models\SagaEvent;
use App\Services\Enums\SagaStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SagaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(SagaEvent::query()->latest()->get());
    }

    public function store(): Response
    {
        $sagaEvent = SagaEvent::create([
            'hotel_reservation_status' => SagaStatus::PENDING,
            'flight_reservation_status' => SagaStatus::PENDING,
        ]);

        MakeHotelReservation::dispatch($sagaEvent->id, fake()->company())->onQueue('hotel-reservation-queue');
        MakeFlightReservation::dispatch($sagaEvent->id, fake()->city(), fake()->city())->onQueue('flight-reservation-queue');

        return response('Saga started!');
    }
}
