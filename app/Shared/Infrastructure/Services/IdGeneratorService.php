<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Services;

use App\Shared\Domain\Models\ValueObjects\Id;
use Ramsey\Uuid\Uuid;

class IdGeneratorService implements \App\Shared\Domain\Services\IdGeneratorServiceInterface
{
    public function generate(): Id
    {
        return new Id(Uuid::uuid4()->toString());
    }

    public function getFromString(string $id): Id
    {
        return new Id(Uuid::fromString($id)->toString());
    }
}
