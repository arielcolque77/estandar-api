<?php

namespace App\Modules\TsAbroadUserContacts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsAbroadUserContactStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'commercial_address' => ['required', 'string'],
            'destination_country_id' => ['required', 'numeric'],
            'receiver_country_cuit' => ['required', 'numeric'],
            'tax_id' => ['nullable', 'string'],
            'export_type_id' => ['required', 'numeric'],
            'incoterm' => ['nullable', 'numeric'],
            'incoterm_extra_info' => ['nullable', 'string'],
            'payment_date' => ['nullable']
        ];
    }
}
