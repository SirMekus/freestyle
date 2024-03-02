<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function __invoke(MessageRequest $request)
    {
        Message::create($request->validated());

        return response("Record was added successfully.");
    }
}
