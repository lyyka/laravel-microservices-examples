<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saga_events', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_reservation_status');
            $table->string('flight_reservation_status');
            $table->timestamps();
        });
    }
};
