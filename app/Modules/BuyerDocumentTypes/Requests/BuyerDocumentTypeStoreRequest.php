<?php

namespace App\Modules\BuyerDocumentTypes\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerDocumentTypeStoreRequest extends FormRequest
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
