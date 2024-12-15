<?php

namespace App\Http\Controllers;

use App\Jobs\MakeUserJob;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventSourcingController extends Controller
{
    public function createUser(): Response
    {
        MakeUserJob::dispatch(
            fake()->firstName(),
            fake()->lastName(),
            fake()->safeEmail()
        );

        return response('User creation dispatched');
    }

    public function listEvents(): JsonResponse
    {
        return response()->json(
            Event::latest()->get()
        );
    }

    public function listUsers(): JsonResponse
    {
        return response()->json(
            User::latest()->get()
        );
    }

    public function clearDatabase(): Response
    {
        User::truncate();
        return response('Users database cleared');
    }

    public function rebuildFromEvents(): Response
    {
        Event::query()->chunk(1000, function ($events) {
            $methodName = 'handle';

            foreach ($events as $event) {
                (new $event->name($event->payload))->{$methodName}(true);
            }
        });

        return response('Users database rebuilt');
    }
}
