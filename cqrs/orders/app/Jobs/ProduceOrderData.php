<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProduceOrderData implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private array &$data
    )
    {
        $data['type'] = 'order_data';
    }
}
