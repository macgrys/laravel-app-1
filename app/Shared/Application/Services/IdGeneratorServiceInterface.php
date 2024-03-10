<?php

namespace App\Shared\Application\Services;

use App\Shared\Domain\Models\ValueObjects\Id;

interface IdGeneratorServiceInterface
{
    public function generate(): Id;

    public function getFromString(string $id): Id;
}
