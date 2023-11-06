<?php

namespace App\Modules\TsArgUsers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsArgUserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ts_user_id' => ['required', 'numeric'],
            'dni' => ['required', 'string', 'unique:ts_arg_users'],
            'monotributo_id' => ['nullable', 'numeric', 'unique:ts_arg_users'],
            'isMonotributista' => ['nullable', 'boolean'],
            'IIBB_registered' => ['nullable', 'boolean'],
            'activities_start_date' => ['nullable'],
            'unified_monotributo' => ['required', 'boolean'],
            'sIsMonotributista' => ['nullable', 'string'],
            'sRegisteredIIBB' => ['nullable', 'string'],
        ];
    }
}
