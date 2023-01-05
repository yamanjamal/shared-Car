<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class GrantRoleRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'user_id'   => ['required','exists:users,id'],
            'role'      => ['required','exists:roles,name'],
        ];
    }

    public function authorize():bool
    {
        return Gate::allows('role_grant');;
    }
}
