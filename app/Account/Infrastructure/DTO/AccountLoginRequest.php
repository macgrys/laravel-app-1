<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\DTO;

use Illuminate\Foundation\Http\FormRequest;

class AccountLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'inputEmail.required' => 'The email field is required.',
            'inputEmail.email' => 'Please enter a valid email address.',
            'inputEmail.unique' => 'The email address is already in use.',
            'inputPassword.required' => 'The password field is required.',
            'inputPassword.string' => 'The password field must be a string.',
            'inputPassword.min' => 'The password must be at least 8 characters long.'
        ];
    }

    public function email(): string
    {
        return $this->input('inputEmail');
    }

    public function password(): string
    {
        return $this->input('inputPassword');
    }
}
