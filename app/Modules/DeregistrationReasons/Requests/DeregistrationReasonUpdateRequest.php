<?php

namespace App\Modules\DeregistrationReasons\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeregistrationReasonUpdateRequest extends FormRequest
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
