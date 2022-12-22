<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'make' => ['required', 'string'],
            'model' => ['required', 'string'],
            'year' => ['required', 'string'],
            'plate' => ['required', 'string'],
            'capacity' => ['required', 'string'],
            'color' => ['required', 'string'],
            'driver_id' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
