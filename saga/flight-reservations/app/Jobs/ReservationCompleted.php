<?php

namespace App\Jobs;

use App\Models\SagaEvent;
use App\Services\Enums\SagaStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ReservationCompleted implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly int $sagaEventId,
        private readonly string $type,
    )
    {
    }
}
