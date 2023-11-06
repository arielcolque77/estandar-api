<?php

namespace App\Modules\VatConditions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VatConditionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
