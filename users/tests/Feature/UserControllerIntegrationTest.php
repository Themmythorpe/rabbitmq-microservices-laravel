<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_user_in_database()
    {
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];

        $response = $this->postJson('/users', $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', $userData);
    }
}
