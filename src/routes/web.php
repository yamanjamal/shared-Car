<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Models\User;


Route::get('/', function () {
     return view('welcome');
//    return $value = Cache::get('users');
//    Cache::remember('users', 60, function () {
//        return User::all()->toArray();
//    });
});
