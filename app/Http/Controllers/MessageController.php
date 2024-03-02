<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function __invoke(MessageRequest $request)
    {
        // dd("djdj");
        $request = $request->validated();

        Message::create($request);
    }
}
