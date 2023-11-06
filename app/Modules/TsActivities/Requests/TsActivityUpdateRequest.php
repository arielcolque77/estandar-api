<?php

namespace App\Modules\TsActivities\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsActivityUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => ['required'],
            'afip_activity' => ['required'],
            'afip_code' => ['required', 'numeric'],
            'rubro' => ['nullable', 'string'],
            'tributo_simple' => ['nullable', 'boolean'],
            'monotributo' => ['nullable', 'boolean'],
            'activity_type' => ['required', 'number'],
            'ts_code' => ['required'],
        ];
    }
}
