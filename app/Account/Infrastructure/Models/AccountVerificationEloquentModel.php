<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountVerificationEloquentModel extends Model
{
    /** @var string */
    protected $table = 'account_verifications';

    protected $primaryKey = 'account_id';

    protected $fillable = [
        'verification_id'
    ];

    public array $rules = [
        'verification_id' => 'required|uuid',
    ];

    public $timestamps = false;

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountEloquentModel::class);
    }
}
