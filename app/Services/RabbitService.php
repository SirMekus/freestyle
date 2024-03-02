<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitService
{
    protected $connection;
    protected $channel;
    protected $exchange = 'user_exchange';
    protected $queue;
    protected $routingKey = 'random';

    public function __construct()
    {
        // $this->connection = new AMQPStreamConnection(
        //     env('RABBITMQ_HOST'),
        //     env('RABBITMQ_PORT'),
        //     env('RABBITMQ_USER'),
        //     env('RABBITMQ_PASSWORD'),
        //     env('RABBITMQ_VHOST')
        // );
        
        $this->connection = new AMQPStreamConnection(
            config('queue.connections.rabbitmq.host'),
            config('queue.connections.rabbitmq.port'),
            config('queue.connections.rabbitmq.user'),
            config('queue.connections.rabbitmq.password'),
            config('queue.connections.rabbitmq.vhost')
        );
        $this->queue = config('queue.connections.rabbitmq.queue');

        $this->channel = $this->connection->channel();

        $this->channel->exchange_declare($this->exchange, 'direct', false, true, false);
        $this->channel->queue_declare($this->queue, false, true, false, false);
        $this->channel->queue_bind($this->queue, $this->exchange, $this->routingKey);
    }

    public function publish(string|array $message)
    {
        // dd(is_array($message) ? json_encode($message) : $message);
        $msg = new AMQPMessage(is_array($message) ? json_encode($message) : $message);
        $this->channel->basic_publish($msg, $this->exchange, $this->routingKey);
    }

    public function consume()
    {
        // dd($this->connection);
        $channel = $this->connection->channel();
        $callback = function ($msg) {
            Log::info($msg->body);
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->basic_consume($this->queue, '', false, true, false, false, $callback);
        echo 'Waiting for new message on test_queue', " \n";
        while ($channel->is_consuming()) {
            $channel->wait();
        }
        $channel->close();
        $this->connection->close();
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}