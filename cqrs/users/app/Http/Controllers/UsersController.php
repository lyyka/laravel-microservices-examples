<?php

namespace App\Http\Controllers;

use App\Jobs\ProduceUserData;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        ProduceUserData::dispatch([
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
        ]);
        return response()->json();
    }
}
