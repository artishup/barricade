<?php

declare(strict_types = 1);

namespace ArtishUp\Shared\Domain\Entity;

use JsonSerializable;

abstract class Entity implements JsonSerializable
{

    abstract function toArray(): array;

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
