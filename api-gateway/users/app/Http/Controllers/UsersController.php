<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'first_name' => 'Test',
                    'last_name' => 'Testic',
                ],
                [
                    'id' => 2,
                    'first_name' => 'Marko',
                    'last_name' => 'Markic',
                ],
            ]
        ]);
    }
}
