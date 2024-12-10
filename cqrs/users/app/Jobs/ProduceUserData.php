<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProduceUserData implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private array &$data
    )
    {
        $data['type'] = 'user_data';
    }
}
