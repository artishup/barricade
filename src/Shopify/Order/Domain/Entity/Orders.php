<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Collection;

final class Orders extends Collection
{
    protected function type(): string
    {
        return Order::class;
    }
}
