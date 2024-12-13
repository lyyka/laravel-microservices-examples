<?php

namespace App\Http\Controllers;

use App\Models\SagaEvent;
use App\Services\Sagas\ReservationsExampleSaga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SagaController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(SagaEvent::query()->latest()->get());
    }

    public function store(): Response
    {
        $id = (new ReservationsExampleSaga)->start();
        return response("Saga $id started!");
    }
}
