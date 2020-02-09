<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Application\Find;

use ArtishUp\Shared\Application\Response;
use ArtishUp\Shopify\Order\Domain\Entity\Order;

final class FindOrderResponse extends Response
{
    private Order $order;

    private function __construct(Order $order)
    {
        $this->order = $order;
    }

    public static function create(Order $order): self
    {
        return new self($order);
    }

    public function toArray(): array
    {
        return $this->order->toArray();
    }
}
