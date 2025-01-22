<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Pool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->as('users')->get('http://api-gateway-users.ddev.site/api/users'),
            $pool->as('orders')->get('http://api-gateway-orders.ddev.site/api/orders'),
        ]);

        return response()->json([
            'users' => $responses['users']->json(),
            'orders' => $responses['orders']->json(),
        ]);
    }
}
