<?php

namespace App\Http\Controllers;

use App\Jobs\MakeFlightReservation;
use App\Jobs\MakeHotelReservation;
use App\Models\SagaEvent;
use App\Services\Enums\SagaStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class SagaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(SagaEvent::query()->latest()->get());
    }

    public function store(): Response
    {
        $sagaEvent = SagaEvent::create([
            'uuid' => Str::uuid()->toString(),
            'hotel_reservation_status' => SagaStatus::PENDING,
            'flight_reservation_status' => SagaStatus::PENDING,
        ]);

        MakeHotelReservation::dispatch($sagaEvent->uuid, fake()->company())->onQueue('hotel-reservation-queue');
        MakeFlightReservation::dispatch($sagaEvent->uuid, fake()->city(), fake()->city())->onQueue('flight-reservation-queue');

        return response('Saga started!');
    }
}
