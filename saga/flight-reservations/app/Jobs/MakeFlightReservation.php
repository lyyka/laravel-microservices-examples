<?php

namespace App\Jobs;

use App\Models\FlightReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeFlightReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId,
        private readonly string $from,
        private readonly string $to,
    )
    {
    }

    public function handle(): void
    {
        FlightReservation::create([
            'saga_id' => $this->sagaEventId,
            'from' => $this->from,
            'to' => $this->to,
        ]);

        FlightReservationCompleted::dispatch($this->sagaEventId)->onQueue('saga-response-queue');
    }
}
