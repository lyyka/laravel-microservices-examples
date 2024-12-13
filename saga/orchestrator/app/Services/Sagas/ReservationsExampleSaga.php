<?php

namespace App\Services\Sagas;

use App\Jobs\CompensateFlightReservation;
use App\Jobs\CompensateHotelReservation;
use App\Jobs\MakeFlightReservation;
use App\Jobs\MakeHotelReservation;
use App\Models\SagaEvent;
use App\Services\Enums\SagaStatus;
use Illuminate\Support\Str;

class ReservationsExampleSaga implements Saga
{
    public function start(): string
    {
        $sagaEvent = SagaEvent::create([
            'uuid' => Str::uuid()->toString(),
            'hotel_reservation_status' => SagaStatus::PENDING,
            'flight_reservation_status' => SagaStatus::PENDING,
        ]);

        MakeHotelReservation::dispatch($sagaEvent->uuid, fake()->company())->onQueue('hotel-reservation-queue');
        MakeFlightReservation::dispatch($sagaEvent->uuid, fake()->city(), fake()->city())->onQueue('flight-reservation-queue');

        return $sagaEvent->uuid;
    }

    public function compensate(string $sagaEventId): void
    {
        CompensateHotelReservation::dispatch($sagaEventId)->onQueue('hotel-reservation-queue');
        CompensateFlightReservation::dispatch($sagaEventId)->onQueue('flight-reservation-queue');
    }
}
