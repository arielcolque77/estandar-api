<?php

namespace App\Modules\ReceiptTypes\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptTypeUpdateRequest extends FormRequest
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
