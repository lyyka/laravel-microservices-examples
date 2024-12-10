<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Order;
use Illuminate\Contracts\Container\BindingResolutionException;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

class RabbitMQHandlerJob extends BaseJob
{
    /**
     * @throws BindingResolutionException
     */
    public function fire(): void
    {
        $payload = $this->payload();

        try {
            $data = array_values((array)unserialize($payload['data']['command']))[1];

            if($data['type'] === 'user_data') {
                User::firstOrCreate(['first_name' => $data['first_name'], 'last_name' => $data['last_name']]);
            } else if ($data['type'] === 'order_data') {
                Order::create(['uuid' => $data['uuid'], 'amount' => $data['amount']]);
            }
        } catch (\Throwable $e) {
            dump($e);
        }

        $this->delete();
    }
}
