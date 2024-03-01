<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Events\UserCreated;
use Illuminate\Support\Facades\Log;
use App\Listeners\UserCreatedListener;

class UserCreatedListenerTest extends TestCase
{
    public function test_user_created_listener_handles_event()
    {
        // Create a mock User object
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ];

        // Create a UserCreated event instance with the user data array
        $event = new UserCreated($userData);

        // Mock the Log facade
        Log::shouldReceive('info')
            ->once()
            ->with('Received new user:', $userData);

        // Create an instance of UserCreatedListener
        $listener = new UserCreatedListener();

        // Call the handle method of the listener and pass the event
        $listener->handle($event);
    }
}
