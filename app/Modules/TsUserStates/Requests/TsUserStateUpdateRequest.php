<?php

namespace App\Modules\TsUserStates\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsUserStateUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ];
    }
}
