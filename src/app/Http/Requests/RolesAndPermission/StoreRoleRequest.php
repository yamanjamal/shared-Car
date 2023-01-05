<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreRoleRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize():bool
    {
        return true;
    }
}
