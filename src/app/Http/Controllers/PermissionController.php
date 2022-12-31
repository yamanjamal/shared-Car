<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\RolesAndPermission\GrantPermissionRequest;
use App\Http\Requests\RolesAndPermission\RevokePermissionRequest;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    public function index()
    {
        $permissions =Permission::all();
        return PermissionResource::collection($permissions);
    }

    public function show(Permission $permission):PermissionResource
    {
        return new PermissionResource($permission->load('roles'));
    }

    public function grant(GrantPermissionRequest $request,Role $role):RoleResource
    {
        $role->givePermissionTo($request->permissions);
        return new RoleResource($role->load('permissions'));
    }

    public function revoke(RevokePermissionRequest $request ,Role $role):RoleResource
    {
        $role->revokePermissionTo($request->permissions);
        return new RoleResource($role->load('permissions'));
    }
}
