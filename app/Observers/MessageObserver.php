<?php

namespace App\Observers;

use App\Events\MessageEvent;
use App\Models\Message;

class MessageObserver
{
    public function created(Message $message)
    {
        event(new MessageEvent($message));
    }
}
