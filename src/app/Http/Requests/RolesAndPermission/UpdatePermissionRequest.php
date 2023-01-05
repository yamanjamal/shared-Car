<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdatePermissionRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize():bool
    {
        // abort_if(Gate::denies('permission_edit'), 403);
        return true;
    }
}
