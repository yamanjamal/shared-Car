<?php

namespace App\Policies;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class TripPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user):Response|bool
    {
        return Gate::allows('trip_access');
    }

    public function view(User $user, Trip $trip):Response|bool
    {
        return Gate::allows('trip_show');
    }

    public function create(User $user):Response|bool
    {
        return Gate::allows('trip_create');
    }

    public function update(User $user, Trip $trip):Response|bool
    {
        return Gate::allows('trip_edit');
    }

    public function delete(User $user, Trip $trip):Response|bool
    {
        return Gate::allows('trip_delete');
    }

    public function restore(User $user, Trip $trip):Response|bool
    {
        return Gate::allows('trip_restore');
    }

    public function forceDelete(User $user, Trip $trip):Response|bool
    {
        return Gate::allows('trip_forceDelete');
    }
}
