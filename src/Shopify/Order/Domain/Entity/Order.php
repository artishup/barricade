<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Entity;
use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;

final class Order extends Entity
{
    private OrderId $orderId;

    private function __construct(OrderId $orderId)
    {
        $this->orderId = $orderId;
    }

    public static function create(OrderId $orderId): self
    {
        return new self($orderId);
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function toArray(): array
    {
        return [
            'orderId'=> $this->orderId->value()
        ];
    }
}
