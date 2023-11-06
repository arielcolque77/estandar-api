<?php

namespace App\Modules\Provinces\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'code' => ['required'],
            'enabled' => ['required'],
            'url' => ['nullable'],
            'unified_monotributo' => ['required'],
            'short_name' => ['nullable'],
            'country_id' => ['required', 'numeric'],
        ];
    }
}
