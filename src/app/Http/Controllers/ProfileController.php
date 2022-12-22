<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function info(): UserResource
    {
        return new UserResource(resource: auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
//        auth()->user()->update([
//        ]);
    }
}
