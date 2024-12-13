<?php

namespace App\Models;

use App\Services\Enums\SagaStatus;
use Illuminate\Database\Eloquent\Model;

class SagaEvent extends Model
{
    protected $fillable = ['uuid', 'hotel_reservation_status', 'flight_reservation_status'];

    protected function casts()
    {
        return [
            'hotel_reservation_status' => SagaStatus::class,
            'flight_reservation_status' => SagaStatus::class,
        ];
    }
}
