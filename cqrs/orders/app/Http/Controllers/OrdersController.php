<?php

namespace App\Http\Controllers;

use App\Jobs\ProduceOrderData;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        ProduceOrderData::dispatch([
            'order_id' => fake()->uuid(),
            'amount' => fake()->numberBetween(1500, 10000),
        ]);
        return response()->json();
    }
}
