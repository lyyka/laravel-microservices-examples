<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Response;

class OrderAnalyticsController extends Controller
{
    public function avgAmount(): Response
    {
        return response(
            Order::query()->avg('amount')
        );
    }
}
