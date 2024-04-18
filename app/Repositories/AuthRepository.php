<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            throw new \Exception("Login failed. Please check your credentials.", 400);
        }

        $user = User::where('email', $credentials['email'])->first();

        $user['token'] = $user->createToken(config('app.name'))->plainTextToken;

        return $user;
    }
}
