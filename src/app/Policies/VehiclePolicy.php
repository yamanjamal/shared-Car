<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class VehiclePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user):Response|bool
    {
        return Gate::allows('vehicle_access');
    }

    public function view(User $user, Vehicle $vehicle):Response|bool
    {
        return Gate::allows('vehicle_show');
    }

    public function create(User $user):Response|bool
    {
        return Gate::allows('vehicle_create');
    }

    public function update(User $user, Vehicle $vehicle):Response|bool
    {
        return Gate::allows('vehicle_edit');
    }

    public function delete(User $user, Vehicle $vehicle):Response|bool
    {
        return Gate::allows('vehicle_delete');
    }

    public function restore(User $user, Vehicle $vehicle):Response|bool
    {
        return Gate::allows('vehicle_restore');
    }

    public function forceDelete(User $user, Vehicle $vehicle):Response|bool
    {
        return Gate::allows('vehicle_forceDelete');
    }
}
