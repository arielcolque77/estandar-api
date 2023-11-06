<?php

namespace App\Modules\TsUserContacts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsUserContactUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'type_id' => ['required', 'numeric'],
            'photo' => ['nullable', 'string'],
            'ts_user_id' => ['required', 'numeric'],
            'number' => ['nullable', 'numeric'],
            'floor' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'postal_code' => ['required', 'string'],
            'additional_data_type' => ['nullable', 'string'],
            'additional_data' => ['nullable', 'string'],
            'vat_condition_id' => ['nullable', 'numeric'],
            'enabled' => ['nullable', 'boolean'],
            'province_id' => ['nullable', 'numeric'],
            'company_name' => ['nullable', 'string'],
        ];
    }
}
