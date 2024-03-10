<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PasswordCast implements CastsAttributes
{

    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return $value;
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return Hash::make($value);
    }
}
