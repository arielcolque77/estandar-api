<?php

namespace App\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'username_canonical' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string'],
            'email_canonical' => ['required', 'string', 'unique:users'],
            'enabled' => ['required', 'boolean'],
            'last_login' => ['nullable'],
            'confirmation_token' => ['nullable', 'string', 'unique:users'],
            'password_requested_at' => ['nullable'],
            'password' => ['nullable', 'string'],
            'ts_user_id' => ['nullable', 'numeric', 'unique:users'],
            'last_password_change' => ['nullable'],
            'expired_password' => ['nullable', 'boolean'],
        ];
    }
}
