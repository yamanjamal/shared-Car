<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TokenAuthController;
use \App\Http\Controllers\StepController;
use \App\Http\Controllers\TripController;
use \App\Http\Controllers\VehicleController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\RoleController;

//Mobile Registration
Route::post('/auth/token', [TokenAuthController::class, 'store'])->middleware('guest');
Route::delete('/auth/token', [TokenAuthController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('trips', TripController::class);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('steps', StepController::class);
    Route::apiResource('users', UserController::class)->only(['index', 'show']);
    Route::get('/me', [ProfileController::class, 'info']);

    //Roles
//    Route::post('roles/grant',              [RoleController::class  ,  'grant']);
//    Route::post('roles/revoke',             [RoleController::class    , 'revoke']);
    Route::apiresource('roles',             RoleController::class);

    //Permissions
    //Route::post('permissions/grant/{role}', [PermissionController::class,    'grant']);
    //Route::post('permissions/revoke/{role}',[PermissionController::class,    'revoke']);
    //Route::apiresource('permissions',        PermissionController::class)->except('update','store','destroy');
});

//new
//// +++++++++++++++++++++++++++++++start Role api+++++++++++++++++++++++++++++++++++
//// +++++++++++++++++++++++++++++++end Role api+++++++++++++++++++++++++++++++++++++
//
//// +++++++++++++++++++++++++++++++start Permission api+++++++++++++++++++++++++++++
//// +++++++++++++++++++++++++++++++end Permission api+++++++++++++++++++++++++++++++
