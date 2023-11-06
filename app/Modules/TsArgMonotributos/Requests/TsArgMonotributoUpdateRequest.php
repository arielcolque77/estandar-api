<?php

namespace App\Modules\TsArgMonotributos\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsArgMonotributoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cuit' => ['required', 'string'],
            'clave_fiscal' => ['nullable'],
            'afip_balance' => ['required', 'numeric'],
            'afip_debt' => ['required', 'numeric'],
            'email' => ['nullable', 'string'],
            'privKey' => ['nullable'],
            'certificateRequest' => ['nullable'],
            'certificateRequestDate' => ['nullable'],
            'certificatePEM' => ['nullable'],
            'certificatePEMEmitionDate' => ['nullable'],
            'certificatePEMDueDate' => ['nullable'],
            'certificatePEMHomo' => ['nullable'],
            'sales_point' => ['nullable', 'numeric'],
            'howToWork' => ['nullable', 'numeric'],
            'physical_space' => ['nullable'],
            'square_mts_number' => ['nullable', 'string'],
            'annual_electric_energy' => ['nullable', 'string'],
            'pay_rent' => ['nullable'],
            'annual_rental_amount' => ['nullable', 'string'],
            'estimated_monthly_amount' => ['nullable', 'numeric'],
            'other_activity_income' => ['nullable'],
            'employer_cuit' => ['nullable', 'string'],
            'spouse_contribution' => ['nullable'],
            'obra_social_id' => ['nullable', 'numeric'],
            'monotributo_category_id' => ['nullable', 'numeric'],
            'residence_id' => ['nullable', 'numeric'],
            'registration_date' => ['nullable'],
            'approved' => ['nullable'],
            'active' => ['nullable'],
            'deregistration_reason' => ['nullable', 'numeric'],
            'deregistration_date' => ['nullable'],
            'automatic_debit' => ['nullable'],
            'cooperative_cuit' => ['nullable', 'string'],
            'annual_bill' => ['nullable', 'numeric'],
            'spouse_cuil' => ['nullable', 'string'],
        ];
    }
}
