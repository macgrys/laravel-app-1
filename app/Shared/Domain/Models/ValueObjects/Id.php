<?php

declare(strict_types=1);

namespace App\Shared\Domain\Models\ValueObjects;

readonly class Id
{
    public function __construct(private string $value)
    {
    }

    public function toString(): string
    {
        return $this->value;
    }
}
