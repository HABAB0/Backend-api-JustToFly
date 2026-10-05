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
    Route::get('profile',[ \App\Http\Controllers\Api\ProfileController::class, 'profile']);
    Route::patch('profile/update',[ \App\Http\Controllers\Api\ProfileController::class, 'update']);
    Route::get('products',[ \App\Http\Controllers\Api\ProductsController::class, 'index']);
    Route::get('products',[ \App\Http\Controllers\Api\ProductsController::class, 'index']);
    Route::apiResource('products', \App\Http\Controllers\Api\ProductsController::class);
});
