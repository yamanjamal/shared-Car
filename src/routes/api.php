<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TokenAuthController;

//
//Route::middleware('guest')->group(function () {
//        $limiter = config('fortify.limiters.login');
//
//    Route::post('/auth/token', [TokenAuthController::class, 'store'])
//        ->middleware(array_filter([$limiter ? 'throttle:' . $limiter : null]));
//});

Route::post('/login', [TokenAuthController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/auth/token', [TokenAuthController::class, 'destroy']);
    Route::apiResource('steps', \App\Http\Controllers\StepController::class);
    Route::apiResource('trips', \App\Http\Controllers\TripController::class);
    Route::apiResource('vehicles', \App\Http\Controllers\VehicleController::class);
    Route::apiResource('users', \App\Http\Controllers\UserController::class)->only(['index', 'show']);
});
//
//
