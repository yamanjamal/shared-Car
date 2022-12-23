<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobileLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenAuthController extends Controller
{
    public function store(Request $request)
    {
        return response()->json('asda');

//        $user = User::where('email', $request->email)->first();
//
//        if (! $user || ! Hash::check($request->password, $user->password)) {
//            throw ValidationException::withMessages([
//                'email' => ['The provided credentials are incorrect.'],
//            ]);
//        }
//
//        return response()->json([
//            'user' => new UserResource($user),
//            'token' => $user->createToken($request->device_name)->plainTextToken
//        ]);
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json();
    }
}
