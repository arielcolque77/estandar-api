<?php

namespace App\Modules\HowToWork\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HowToWorkUpdateRequest extends FormRequest
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
