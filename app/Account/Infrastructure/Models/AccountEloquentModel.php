<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Models;

use App\Account\Infrastructure\Models\Casts\PasswordCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AccountEloquentModel extends Model
{
    /** @var string */
    protected $table = 'accounts';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'number',
        'email',
        'password',
        'is_verified',
    ];

    public array $rules = [
        'id' => 'required|uuid',
        'number' => 'required',
        'email' => 'required',
        'password' => 'required',
        'is_verified' => 'boolean'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => PasswordCast::class
    ];

    public function number(): HasOne
    {
        return $this->hasOne(AccountNumberEloquentModel::class, 'account_id');
    }

    public function verification(): HasOne
    {
        return $this->hasOne(AccountVerificationEloquentModel::class, 'account_id');
    }
}
