<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StorePermissionRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize():bool
    {
        // abort_if(Gate::denies('permission_create'), 403);

        return true;
    }

    public function messages():array
    {
        return [
            'name.required' => 'A title is required',
        ];
    }
}
