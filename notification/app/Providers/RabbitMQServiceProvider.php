<?php

namespace App\Providers;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_USERNAME'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST'),
            false, // lazy
            'AMQPLAIN',
            null,
            'en_US',
            3.0, // read_timeout
            3.0  // write_timeout
        );

        $channel = $connection->channel();

        // Define queue/exchange
        $channel->queue_declare('user_created_queue', false, true, false, false);
        $channel->exchange_declare('user_created_exchange', 'direct', false, true, false);
        $channel->queue_bind('user_created_queue', 'user_created_exchange');

        // Consume messages from RabbitMQ
        $channel->basic_consume('user_created_queue', '', false, true, false, false, function ($msg) {
            // Process the message
            $userData = json_decode($msg->body, true);
            Log::info('Received new user:', $userData);

            // Dispatch the UserCreated event
            event(new UserCreated($userData));

            // Acknowledge the message
            $msg->ack();
        });

        // Keep the script running to continuously consume messages
        while ($channel->is_consuming()) {
            $channel->wait();
        }
    }
    public function register()
    {
        //
    }
}
