<?php
namespace App\Providers;

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
    }

    public function register()
    {
        //
    }
}
