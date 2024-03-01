<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerFunctionalTest extends TestCase
{
    public function test_store_method_returns_correct_response()
    {
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];

        $response = $this->postJson('/users', $userData);

        $response->assertStatus(201)
            ->assertJson(['message' => 'User created successfully']);
    }
}
