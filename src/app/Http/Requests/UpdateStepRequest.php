<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStepRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'long' => ['required', 'between:-180,180'],
            'lat' => ['required', 'between:-90,90'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
