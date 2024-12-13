<?php

namespace App\Jobs;

use App\Models\HotelReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

class MakeHotelReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId,
        private readonly string $hotelName,
    )
    {
    }

    public function handle(): void
    {
        try {
            HotelReservation::create([
                'saga_id' => $this->sagaEventId,
                'hotel_name' => $this->hotelName,
            ]);

            HotelReservationCompleted::dispatch($this->sagaEventId)->onQueue('saga-response-queue');
        } catch (Throwable) {
            FailedHotelReservation::dispatch($this->sagaEventId)->onQueue('saga-response-queue');
        }
    }
}
