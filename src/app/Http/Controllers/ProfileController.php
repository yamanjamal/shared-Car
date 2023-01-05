<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class ProfileController extends Controller
{
    public function info(): UserResource
    {
        $user = User::with('roles.permissions')->where('id', auth()->user()->id)->first();
        return new UserResource(resource: $user);
    }

    public function update(UpdateProfileRequest $request)
    {
        //
    }
}
