<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        // dd("done");
        
        $response->assertSuccessful();
        // dd("ase");

        $this->assertDatabaseHas("messages", $data);
    }
}
