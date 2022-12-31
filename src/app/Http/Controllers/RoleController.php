<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesAndPermission\GrantRoleRequest;
use App\Http\Requests\RolesAndPermission\RevokeRoleRequest;
use App\Http\Requests\RolesAndPermission\StoreRoleRequest;
use App\Http\Requests\RolesAndPermission\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
//use Spatie\Permission\Models\Role;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
////        abort_if(Gate::denies('role_access'), 403);
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function show(Role $role)
    {
//        abort_if(Gate::denies('role_show'), 403);
        return new RoleResource($role->load('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated()+['guard_name'=>'web']);
        return new RoleResource($role);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return $this->sendResponse(new RoleResource($role),'Role updated sussesfully');
    }

    public function destroy(Role $role)
    {
//        abort_if(Gate::denies('role_delete'), 403);
        $role->delete();
        return response()->noContent();
    }

    public function grant(GrantRoleRequest $request)
    {
//        abort_if(Gate::denies('role_grant'), 403);
        $user = User::with('roles.permissions','permissions')->where('id','!=',1)->findOrFail($request->user_id);
        $user->assignRole($request->role);
        return $this->sendResponse(new UserResource($user),'Role granted sussesfully');
    }

    public function revoke(RevokeRoleRequest $request)
    {
//        abort_if(Gate::denies('role_revoke'), 403);
        $user = User::with('roles.permissions','permissions')->where('id','!=',1)->findOrFail($request->user_id);
        $user->removeRole($request->role);
        return $this->sendResponse(new UserResource($user),'Role granted sussesfully');
    }
}
