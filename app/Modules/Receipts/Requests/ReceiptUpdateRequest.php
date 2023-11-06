<?php

namespace App\Modules\Receipts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'monotributo_id' => ['nullable', 'numeric'],
            'contact_id' => ['nullable', 'numeric'],
            'abroad_contact_id' => ['nullable', 'numeric'],
            'concept_id' => ['nullable', 'numeric'],
            'receipt_date' => ['required'],
            'total_amount' => ['required', 'numeric'],
            'net_amount' => ['required', 'numeric'],
            'date_since' => ['nullable'],
            'date_until' => ['nullable'],
            'payment_due_date' => ['nullable'],
            'receipt_type_id' => ['required', 'numeric'],
            'buyer_document_type_id' => ['nullable', 'numeric'],
            'payment_method_id' => ['required', 'numeric'],
            'currency' => ['required', 'string'],
            'buyer_document' => ['nullable', 'string'],
            'cae' => ['nullable', 'string'],
            'cae_due_date' => ['nullable'],
            'voucher_number' => ['nullable', 'numeric'],
            'paid' => ['nullable', 'boolean'],
            'ts_user_id' => ['nullable', 'numeric'],
            'ts_activity_id' => ['nullable', 'numeric'],
            'associated_receipt_id' => ['nullable', 'numeric'],
            'sales_point' => ['nullable', 'numeric'],
            'currency_trade' => ['nullable', 'numeric'],
            'afip_coming' => ['nullable', 'boolean'],
        ];
    }
}
