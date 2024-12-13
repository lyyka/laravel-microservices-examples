<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeOrder implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly array $data
    )
    {
    }

    public function handle(): void
    {
        Order::create(['uuid' => $this->data['uuid'], 'amount' => $this->data['amount']]);
    }
}
