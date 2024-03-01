<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreated
{
    use Dispatchable, SerializesModels;

    public $userData;

    /**
     * Create a new event instance.
     *
     * @param array $userData
     */
    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }
}
