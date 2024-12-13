<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightReservation extends Model
{
    protected $fillable = ['saga_id', 'from', 'to'];
}
