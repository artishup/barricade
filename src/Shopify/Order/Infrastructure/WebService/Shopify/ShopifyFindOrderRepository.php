<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\WebService\Shopify;

use ArtishUp\Shopify\Order\Domain\Entity\Order;
use ArtishUp\Shopify\Order\Domain\Repository\FindOrderRepository;
use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;
use ArtishUp\Shopify\Store\Infrastructure\WebService\Shopify\ShopifyRepositoryAbstract;

class ShopifyFindOrderRepository extends ShopifyRepositoryAbstract implements FindOrderRepository
{
    public function find(OrderId $orderId): Order
    {
        $url = Routes::order($orderId->value());

        $response = $this->submit($url, 'GET');

        return Order::create(
            OrderId::create('')
        );
    }
}
