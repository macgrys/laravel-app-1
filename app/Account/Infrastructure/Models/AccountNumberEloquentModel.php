<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountNumberEloquentModel extends Model
{
    /** @var string */
    protected $table = 'account_numbers';

    protected $primaryKey = 'number';

    public $timestamps = false;

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountEloquentModel::class);
    }
}
