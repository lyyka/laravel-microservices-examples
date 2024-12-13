<?php

namespace App\Http\Controllers;

use App\Jobs\MakeOrder;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        MakeOrder::dispatch([
            'uuid' => fake()->uuid(),
            'amount' => fake()->numberBetween(1500, 10000),
        ]);
        return response()->json();
    }
}
