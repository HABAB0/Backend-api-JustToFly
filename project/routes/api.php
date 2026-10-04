<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['throttle:api'])->group(function (){
    Route::post('signup',[ \App\Http\Controllers\Api\AuthController::class, 'signup']);

    Route::post('login',[ \App\Http\Controllers\Api\AuthController::class, 'login']);
});

Route::middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::get('logout',[ \App\Http\Controllers\Api\AuthController::class, 'logout']);
});
