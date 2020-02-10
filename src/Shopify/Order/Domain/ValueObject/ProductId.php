<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\ValueObject;

use ArtishUp\Shared\Domain\ValueObject\StringValueObject;

class ProductId extends StringValueObject
{
    public static function create(string $value): self
    {
        return new self($value);
    }
}
