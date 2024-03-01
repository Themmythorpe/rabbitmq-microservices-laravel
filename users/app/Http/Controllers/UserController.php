<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\UserCreated;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);

        $user = User::create($validatedData);
        event(new UserCreated($user));

        return response()->json(['message' => 'User created successfully'], 201);
    }
}
