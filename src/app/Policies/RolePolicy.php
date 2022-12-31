<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user):Response|bool
    {
        return Gate::allows('role_access');
    }

    public function view(User $user, Role $role):Response|bool
    {
        return Gate::allows('role_show');
    }

    public function create(User $user):Response|bool
    {
        return Gate::allows('role_create');
    }

    public function update(User $user, Role $role):Response|bool
    {
        return Gate::allows('role_edit');
    }

    public function delete(User $user, Role $role):Response|bool
    {
        return Gate::allows('role_delete');
    }

    public function restore(User $user, Role $role):Response|bool
    {
        return Gate::allows('role_restore');
    }

    public function forceDelete(User $user, Role $role):Response|bool
    {
        return Gate::allows('role_forceDelete');
    }
}
