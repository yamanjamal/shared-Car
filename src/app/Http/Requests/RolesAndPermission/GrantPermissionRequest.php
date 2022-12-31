<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class GrantPermissionRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'permissions'=>['required']
        ];
    }

    public function authorize():bool
    {
        abort_if(Gate::denies('permission_grant'),403);
        return true;
    }


}
