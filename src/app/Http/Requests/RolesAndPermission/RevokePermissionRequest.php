<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

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
        abort_if(Gate::denies('permission_revoke'),403);
        return true;
    }
}
