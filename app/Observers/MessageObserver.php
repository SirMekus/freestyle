<?php

namespace App\Observers;

use App\Events\MessageEvent;
use App\Models\Message;

class MessageObserver
{
    public function created(Message $message): void
    {
        event(new MessageEvent($message->only("email", 'firstName', 'lastName')));
    }
}
