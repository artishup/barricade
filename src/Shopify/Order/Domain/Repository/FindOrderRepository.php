<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Repository;

use ArtishUp\Shopify\Store\Domain\Store;
use ArtishUp\Shopify\Order\Domain\Entity\Order;
use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;

interface FindOrderRepository
{
    public function find(Store $store, OrderId $orderId): ?Order;
}
