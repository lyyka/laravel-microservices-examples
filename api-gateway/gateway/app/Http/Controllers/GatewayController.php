<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GatewayController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'users' => Http::get('http://api-gateway-users.ddev.site/api/users')
                ->json(),
            'orders' => Http::get('http://api-gateway-orders.ddev.site/api/orders')
                ->json(),
        ]);
    }
}
