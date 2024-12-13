<?php

namespace App\Services\Sagas;

interface Saga
{
    public function start(): string;

    public function compensate(string $sagaEventId): void;
}
