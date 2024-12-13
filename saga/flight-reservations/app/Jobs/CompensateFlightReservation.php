<?php

namespace App\Jobs;

use App\Models\FlightReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CompensateFlightReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId
    )
    {
    }

    public function handle(): void
    {
        FlightReservation::where('saga_id', $this->sagaEventId)->delete();
    }
}
