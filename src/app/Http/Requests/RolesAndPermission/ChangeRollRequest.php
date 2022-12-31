<?php

namespace App\Http\Requests\RolesAndPermission;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRollRequest extends FormRequest
{
    public function rules():array
    {
        return [
            'oldrole'   => ['required','exists:roles,name'],
            'newrole'   => ['required','exists:roles,name'],
            'user_id'   => ['required','exists:users,id'],
        ];
    }

    public function authorize():bool
    {
        return true;
    }

}

