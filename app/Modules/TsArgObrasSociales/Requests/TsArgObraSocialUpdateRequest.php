<?php

namespace App\Modules\TsArgObrasSociales\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsArgObraSocialUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'unique:ts_arg_obras_sociales'],
            'code' => ['nullable', 'string', 'unique:ts_arg_obras_sociales'],
            'phone' => ['nullable', 'string'],
            'web_page' => ['nullable', 'string'],
            'enabled' => ['required', 'boolean'],
            'acronyms' => ['nullable', 'string'],
        ];
    }
}
