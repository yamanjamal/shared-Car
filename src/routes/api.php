<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TokenAuthController;
use \App\Http\Controllers\StepController;
use \App\Http\Controllers\TripController;
use \App\Http\Controllers\VehicleController;
use \App\Http\Controllers\UserController;

//Mobile Registration
Route::post('/auth/token', [TokenAuthController::class, 'store'])->middleware('guest');
Route::delete('/auth/token', [TokenAuthController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('steps', StepController::class);
    Route::apiResource('trips', TripController::class);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('users', UserController::class)->only(['index', 'show']);
});
