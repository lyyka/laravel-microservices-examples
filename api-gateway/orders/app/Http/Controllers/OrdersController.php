<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'amount' => 1500
                ],
                [
                    'id' => 2,
                    'amount' => 2500
                ],
            ]
        ]);
    }
}
