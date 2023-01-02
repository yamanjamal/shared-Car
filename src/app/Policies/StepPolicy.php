<?php

namespace App\Policies;

use App\Models\Step;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class StepPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user):Response|bool
    {
        return Gate::allows('step_access');
    }

    public function view(User $user, Step $step):Response|bool
    {
        return Gate::allows('step_show');
    }

    public function create(User $user):Response|bool
    {
        return Gate::allows('step_create');
    }

    public function update(User $user, Step $step):Response|bool
    {
        return Gate::allows('step_edit');
    }

    public function delete(User $user, Step $step):Response|bool
    {
        return Gate::allows('step_delete');
    }

    public function restore(User $user, Step $step):Response|bool
    {
        return Gate::allows('step_restore');
    }

    public function forceDelete(User $user, Step $step):Response|bool
    {
        return Gate::allows('step_forceDelete');
    }
}
