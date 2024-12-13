<?php

namespace App\Jobs;

use App\Models\SagaEvent;
use App\Services\Sagas\ReservationsExampleSaga;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FailedFlightReservation implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $sagaEventId
    )
    {
    }

    public function handle(): void
    {
        SagaEvent::where('uuid', $this->sagaEventId)->update([
            'flight_reservation_status' => 'failed'
        ]);

        (new ReservationsExampleSaga)->compensate($this->sagaEventId);
    }
}
