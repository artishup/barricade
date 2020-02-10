<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Aggregate\AggregateRoot;
use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;

final class Order extends AggregateRoot
{
    private OrderId $id;
    private Customer $customer;
    private ShippingAddress $shippingAddress;
    private Items $items;
    private Total $total;

    private function __construct(
        OrderId $id,
        Customer $customer,
        ShippingAddress $shippingAddress,
        Items $items,
        Total $total
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->items = $items;
        $this->total = $total;
    }

    public static function create(
        OrderId $id,
        Customer $customer,
        ShippingAddress $shippingAddress,
        Items $items,
        Total $total
    ): self {
        return new self($id, $customer, $shippingAddress, $items, $total);
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function customer(): Customer
    {
        return $this->customer;
    }

    public function shippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function items(): Items
    {
        return $this->items;
    }

    public function total(): Total
    {
        return $this->total;
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id()->value(),
            'customer'        => $this->customer(),
            'shippingAddress' => $this->shippingAddress(),
            'items'           => $this->items()->toArray(),
            'total'           => $this->total()
        ];
    }
}
