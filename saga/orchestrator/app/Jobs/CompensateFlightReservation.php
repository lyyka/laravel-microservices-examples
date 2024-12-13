<?php

namespace App\Jobs;

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
}
