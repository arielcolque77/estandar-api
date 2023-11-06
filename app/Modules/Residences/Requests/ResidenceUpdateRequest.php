<?php

namespace App\Modules\Residences\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidenceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'street' => ['required', 'string'],
            'number' => ['required', 'numeric'],
            'floor' => ['nullable', 'numeric'],
            'department' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
            'additional_data_type' => ['nullable', 'string'],
            'additional_data' => ['nullable', 'string'],
            'type' => ['required', 'numeric'],
            'province_id' => ['nullable', 'numeric'],
        ];
    }
}
