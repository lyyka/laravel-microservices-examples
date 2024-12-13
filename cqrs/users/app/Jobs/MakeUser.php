<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeUser implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly array $data
    )
    {
    }
}
