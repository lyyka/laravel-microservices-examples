<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeUser implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly array &$data
    )
    {
    }

    public function handle(): void
    {
        User::firstOrCreate(['first_name' => $this->data['first_name'], 'last_name' => $this->data['last_name']]);
    }
}
