<?php

namespace App\Listeners;

use App\Events\MessageEvent;
use Illuminate\Support\Facades\Log;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageEvent $event): void
    {
        $msg = $event->message;
        
        Log::info($msg);
    }
}
