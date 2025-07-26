<?php

use App\Http\Controllers\Api\V1\HobbyController;
use App\Http\Controllers\Api\V1\PhoneNumberController;
use App\Http\Controllers\Api\V1\ProfileController;
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
    Route::apiResource('users', UserController::class);
    Route::post('/users/{user}/hobbies', [UserController::class, 'attachHobby']);
    Route::delete('/users/{user}/hobbies/{hobby}', [UserController::class, 'detachHobby']);
    Route::apiResource('profile', ProfileController::class);
    Route::apiResource('phone', PhoneNumberController::class);

    Route::get('/user/profile', [UserController::class, 'getProfile']);
    Route::get('/user/hobbies', [UserController::class, 'getHobbies']);
    Route::get('/user/phonenumbers', [UserController::class, 'getPhoneNumbers']);
});