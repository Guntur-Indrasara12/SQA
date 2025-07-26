<?php

use App\Http\Controllers\Api\V1\HobbyController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\API\AuthController;

Route::prefix('v1')->
    group(function () {
        Route::apiResource('products', ProductController::class);
    });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('hobby', HobbyController::class);
    Route::apiResource('user', UserController::class);
    Route::post('/users/{user}/hobbies', [UserController::class, 'attachHobby']);
    Route::delete('/users/{user}/hobbies/{hobby}', [UserController::class, 'detachHobby']);
});