<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Entity;
use ArtishUp\Shopify\Order\Domain\ValueObject\ProductId;

final class Product extends Entity
{
    private ProductId $id;
    private string $name;
    private string $sku;
    private string $variant;
    private int $quantity;
    private float $price;

    private function __construct(
        ProductId $id,
        string $name,
        string $sku,
        string $variant,
        int $quantity,
        float $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->sku = $sku;
        $this->variant = $variant;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public static function create(
        ProductId $id,
        string $name,
        string $sku,
        string $variant,
        int $quantity,
        float $price
    ): self {
        return new self($id, $name, $sku, $variant, $quantity, $price);
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function variant(): string
    {
        return $this->variant;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function toArray(): array
    {
        return [
            'id'       => $this->id()->value(),
            'name'     => $this->name(),
            'sku'      => $this->sku(),
            'variant'  => $this->variant(),
            'quantity' => $this->quantity(),
            'price'    => $this->price()
        ];
    }
}
