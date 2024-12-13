<?php

namespace App\Services\Enums;

enum SagaStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
}
