<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['throttle:api'])->group(function (){
    Route::post('signup',[ \App\Http\Controllers\Api\AuthController::class, 'signup']);
    Route::post('login',[ \App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::get('products',[ \App\Http\Controllers\Api\ProductController::class, 'index']);
});

Route::middleware(['throttle:api', 'auth:sanctum'])->group(function () {
    Route::get('logout',[ \App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('profile',[ \App\Http\Controllers\Api\ProfileController::class, 'profile']);
    Route::patch('profile/update',[ \App\Http\Controllers\Api\ProfileController::class, 'update']);
    Route::get('products',[ \App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::get('cart',[ \App\Http\Controllers\Api\CartController::class, 'index']);
    Route::post('cart/{product}',[ \App\Http\Controllers\Api\CartController::class, 'store']);
    Route::delete('cart/{product}',[ \App\Http\Controllers\Api\CartController::class, 'destroy']);
    Route::get('order',[ \App\Http\Controllers\Api\OrderController::class, 'index']);
    Route::post('order',[ \App\Http\Controllers\Api\OrderController::class, 'store']);
});

Route::middleware(['throttle:api', 'auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
});
