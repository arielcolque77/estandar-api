<?php

namespace App\Modules\Concepts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConceptStoreRequest extends FormRequest
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
