<?php

namespace App\Modules\TsUsers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsUserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'country_id' => ['required', 'numeric'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'cuit' => ['nullable', 'string', 'unique:ts_users'],
            'birth_date' => ['required'],
            'address' => ['nullable', 'string'],
            'cellphone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'recommended' => ['nullable', 'numeric'],
            'state_id' => ['nullable', 'numeric'],
            'active' => ['nullable', 'boolean'],
            'accountant_message' => ['nullable'],
            'real_residence_id' => ['nullable', 'numeric'],
            'fiscal_residence_id' => ['nullable', 'numeric'],
            'tax_jurisdiction_id' => ['nullable', 'numeric'],
            'unsubscription_date' => ['nullable'],
            'reenter_data' => ['required', 'boolean'],
            'tax_report_service' => ['required', 'boolean'],
            'tax_report_service_registration_date' => ['nullable'],
            'billing_service' => ['required', 'boolean'],
            'billing_service_registration_date' => ['nullable'],
            'accounting_service' => ['required', 'boolean'],
            'accounting_service_registration_date' => ['nullable'],
            'blocked_user_date' => ['nullable'],
        ];
    }
}
