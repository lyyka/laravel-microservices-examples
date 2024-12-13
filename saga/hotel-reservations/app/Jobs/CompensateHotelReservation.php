<?php

namespace App\Jobs;

use App\Models\HotelReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CompensateHotelReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId
    )
    {
    }

    public function handle(): void
    {
        HotelReservation::where('saga_id', $this->sagaEventId)->delete();
    }
}
