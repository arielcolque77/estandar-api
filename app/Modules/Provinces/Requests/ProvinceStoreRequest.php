<?php

namespace App\Modules\Provinces\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'code' => ['required', 'string', 'unique:provinces'],
            'enabled' => ['required', 'boolean'],
            'url' => ['nullable', 'string'],
            'unified_monotributo' => ['required', 'boolean'],
            'short_name' => ['nullable', 'string'],
            'country_id' => ['required', 'numeric'],
        ];
    }
}
