<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_creates_user()
    {
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];

        $request = new Request($userData);
        $controller = new UserController();
        $response = $controller->store($request);

        $this->assertDatabaseHas('users', $userData);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(201, $response->getStatusCode());    }
}
