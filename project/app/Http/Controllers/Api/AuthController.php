<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginUserRequests;
use App\Http\Requests\StoreUserRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function signup(StoreUserRequests $requests)
    {
        $user = User::create($requests->validated());

        $token = $user->createToken("Token of user: {$user->fio}")->plainTextToken;

        return response()->json([
            'user_token' => $token,
        ], 201);
    }

    public function login(LoginUserRequests $requests)
    {
        if (!Auth::attempt($requests->only(['email', 'password']))){
            return response()->json([
                'password' => 'Login failed'
            ], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken("Token of user: {$user->fio}")->plainTextToken;
        return response()->json([
            'user_token' => $token,
        ]);
    }
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout'
        ], );
    }

}
