<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Message;
use App\Events\MessageEvent;
// use PHPUnit\Framework\TestCase;
use App\Listeners\MessageListener;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;

class UserMessageTest extends TestCase
{
    use WithFaker;
    /**
     * @test
     */
    public function event_is_fired_after_creating_record(): void
    {
        Message::factory()->create();
        
        Event::fake();
        Event::assertListening(
            MessageEvent::class,
            MessageListener::class
        );

        $this->assertDatabaseCount("messages", 1);

        // Log::shouldReceive('info')
        // ->once()
        // ->with('User created: ');
    }
}
