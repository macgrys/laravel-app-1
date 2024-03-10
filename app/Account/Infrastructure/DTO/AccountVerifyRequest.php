<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\DTO;

use Illuminate\Foundation\Http\FormRequest;

class AccountVerifyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'accountId' => 'required|uuid',
            'verificationId' => 'required|uuid'
        ];
    }

    public function messages()
    {
        return [
            'accountId.required' => '\'accountId\' is required',
            'accountId.uuid' => '\'accountId\' should be an uuid',
            'verificationId.required' => '\'verificationId\' is required',
            'verificationId.uuid' => '\'verificationId\' should be an uuid'
        ];
    }
}
