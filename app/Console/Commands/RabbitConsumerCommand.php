<?php

namespace App\Console\Commands;

use App\Services\RabbitService;
use Illuminate\Console\Command;

class RabbitConsumerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mq:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mqService = new RabbitService();
        $mqService->consume();
    }
}
