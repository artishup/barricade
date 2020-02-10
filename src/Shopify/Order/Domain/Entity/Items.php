<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Collection;

final class Items extends Collection
{
    protected function type(): string
    {
        return Product::class;
    }

    public function toArray(): array
    {
        return $this->items();
    }
}
