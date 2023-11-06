<?php

namespace App\Modules\TsArgMonotributoCategories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsArgMonotributoCategoryUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'letter' => ['required', 'string'],
            'lower_limit' => ['required', 'numeric'],
            'upper_limit' => ['required', 'numeric'],
            'activity' => ['required', 'string'],
            'min_employee' => ['required', 'string'],
            'surface' => ['required', 'string'],
            'energy' => ['required', 'string'],
            'annual_rent' => ['required', 'numeric'],
            'max_amount' => ['required', 'numeric'],
            'service_tax' => ['required', 'numeric'],
            'thing_tax' => ['required', 'numeric'],
            'sipa_contribution' => ['required', 'numeric'],
            'os_contribution' => ['required', 'numeric'],
            'total_service' => ['required', 'numeric'],
            'total_thing' => ['required', 'numeric'],
            'is_letter' => ['required', 'boolean'],
        ];
    }
}
