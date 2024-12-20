<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeHotelReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId,
        private readonly string $hotelName,
    )
    {
    }
}
