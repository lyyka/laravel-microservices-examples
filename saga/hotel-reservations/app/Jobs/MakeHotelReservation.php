<?php

namespace App\Jobs;

use App\Models\HotelReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeHotelReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $sagaEventId,
        private readonly string $hotelName,
    )
    {
    }

    public function handle(): void
    {
        HotelReservation::create([
            'hotel_name' => $this->hotelName,
        ]);

        HotelReservationCompleted::dispatch($this->sagaEventId, 'hotel')->onQueue('saga-response-queue');
    }
}
