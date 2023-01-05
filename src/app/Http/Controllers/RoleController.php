<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Http\Requests\RolesAndPermission\GrantRoleRequest;
use App\Http\Requests\RolesAndPermission\RevokeRoleRequest;
use App\Http\Requests\RolesAndPermission\StoreRoleRequest;
use App\Http\Requests\RolesAndPermission\UpdateRoleRequest;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function show(Role $role):RoleResource
    {
        return new RoleResource($role->load('permissions'));
    }

    public function store(StoreRoleRequest $request):RoleResource
    {
        $role = Role::create($request->validated()+['guard_name'=>'web']);
        return new RoleResource($role);
    }

    public function update(UpdateRoleRequest $request, Role $role):RoleResource
    {
        $role->update($request->validated());
        return new RoleResource($role);
    }

    public function destroy(Role $role):Response
    {
        $role->delete();
        return response()->noContent();
    }

    public function grant(GrantRoleRequest $request):UserResource
    {
        $user = User::with('roles.permissions')->findOrFail($request->user_id);
        $user->assignRole($request->role);
        return new UserResource($user);
    }

    public function revoke(RevokeRoleRequest $request):UserResource
    {
        $user = User::with('roles.permissions','permissions')->findOrFail($request->user_id);
        $user->removeRole($request->role);
        return new UserResource($user);
    }
}
