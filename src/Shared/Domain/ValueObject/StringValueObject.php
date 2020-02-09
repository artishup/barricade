<?php

declare(strict_types = 1);

namespace ArtishUp\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static abstract function create(string $value);

    public function value(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}
