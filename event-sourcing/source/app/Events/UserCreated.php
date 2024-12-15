<?php

namespace App\Events;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Str;

readonly class UserCreated
{
    public function __construct(private array $payload)
    {
    }

    public function handle(bool $isReplayed = false): void
    {
        User::create([
            'first_name' => $this->payload['firstName'],
            'last_name' => $this->payload['lastName'],
            'email' => $this->payload['email'],
        ]);

        if(!$isReplayed) {
            Event::create([
                'uuid' => Str::uuid(),
                'name' => get_class($this),
                'payload' => $this->payload,
            ]);
        }
    }
}
