<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Store\Domain;

use ArtishUp\Shared\Domain\Entity\Collection;

final class Stores extends Collection
{
    protected function type(): string
    {
        return Store::class;
    }
}
