<?php

namespace App\Modules\TsUserContactTypes\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsUserContactTypeUpdateRequest extends FormRequest
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
