<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginUserRequests;
use App\Http\Requests\StoreUserRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function register(StoreUserRequests $requests)
    {
        return User::create($requests->all());
    }

    public function login(LoginUserRequests $requests)
    {
        if (!Auth::attempt($requests->only(['email', 'password']))){
            return response()->json([
                'message' => 'Wrong email or password'
            ], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json([
            'user' => [
                'id' => $user->id,
                'fio' => $user->fio,
                'email' => $user->email,
            ],
            'token' => $user->createToken("Token of user: {$user->fio}")->plainTextToken
        ]);
    }
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Token removed'
        ], );
    }

}
