<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;

class UserMessageTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function can_send_users_request(): void
    {   
        $data = [
            'email'=> $this->faker->email,
            'firstName'=> $this->faker->firstName(),
            'lastName'=> $this->faker->lastName(),
        ];

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post(route("users"), $data);
        
        $response->assertSuccessful();
        $this->assertDatabaseHas("messages", $data);

        // Log::shouldReceive('info')
        // ->once()
        // ->with($data);
    }
}
