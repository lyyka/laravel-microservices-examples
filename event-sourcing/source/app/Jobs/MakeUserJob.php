<?php

namespace App\Jobs;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeUserJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $firstName,
        private readonly string $lastName,
        private readonly string $email
    )
    {
    }

    public function handle(): void
    {
        (new UserCreated([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ]))->handle();
    }
}
