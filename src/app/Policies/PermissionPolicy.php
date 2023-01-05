<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Gate;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user):Response|bool
    {
        return Gate::allows('permission_access');
    }

    public function view(User $user, Permission $permission):Response|bool
    {
        return Gate::allows('permission_show');
    }

    public function create(User $user):Response|bool
    {
        return Gate::allows('permission_create');
    }

    public function update(User $user, Permission $permission):Response|bool
    {
        return Gate::allows('permission_edit');
    }

    public function delete(User $user, Permission $permission):Response|bool
    {
        return Gate::allows('permission_delete');
    }

    public function restore(User $user, Permission $permission):Response|bool
    {
        return Gate::allows('permission_restore');
    }

    public function forceDelete(User $user, Permission $permission):Response|bool
    {
        return Gate::allows('permission_forceDelete');
    }
}
