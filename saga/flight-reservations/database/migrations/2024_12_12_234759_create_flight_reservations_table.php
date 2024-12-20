<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flight_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->timestamps();
        });
    }
};
