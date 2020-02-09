<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Repository;

use ArtishUp\Shopify\Order\Domain\Entity\Orders;

interface ListOrderRepository
{
    public function list(array $params): Orders;
}
