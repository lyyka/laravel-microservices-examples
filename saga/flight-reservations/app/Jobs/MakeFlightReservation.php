<?php

namespace App\Jobs;

use App\Models\FlightReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeFlightReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $sagaEventId,
        private readonly string $from,
        private readonly string $to,
    )
    {
    }

    public function handle(): void
    {
        FlightReservation::create([
            'from' => $this->from,
            'to' => $this->to,
        ]);

        FlightReservationCompleted::dispatch($this->sagaEventId, 'flight')->onQueue('saga-response-queue');
    }
}
