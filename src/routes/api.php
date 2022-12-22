<?php

use Illuminate\Support\Facades\Route;


Route::apiResource('steps', \App\Http\Controllers\StepController::class);
Route::apiResource('trips', \App\Http\Controllers\TripController::class);
Route::apiResource('vehicles', \App\Http\Controllers\VehicleController::class);
Route::apiResource('users', \App\Http\Controllers\UserController::class)->only(['index', 'show']);
