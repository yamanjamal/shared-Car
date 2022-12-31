<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class RevokePermissionRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'permissions'=>['required']
        ];
    }

    public function authorize():bool
    {
        return Gate::allows('permission_revoke');
    }
}
