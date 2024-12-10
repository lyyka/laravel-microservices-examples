<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Response;

class UserAnalyticsController extends Controller
{
    public function count(): Response
    {
        return response(
            User::query()->count()
        );
    }
}
