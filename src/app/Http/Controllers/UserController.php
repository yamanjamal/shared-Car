<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate($request->get('limit', 10));
        return UserResource::collection($users);
    }

    public function show(User $user): UserResource
    {
        return new UserResource(resource: $user->load('roles.permissions'));
    }

    public function count()
    {
        $this->authorize('count', User::class);
        return User::count();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
