<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Domain\Entity;

use ArtishUp\Shared\Domain\Entity\Entity;

final class Total extends Entity
{
    private float $total;
    private float $tax;
    private float $discount;
    private float $subtotal;
    private float $shipping;
    private float $grandTotal;

    private function __construct(
        float $total,
        float $tax,
        float $discount,
        float $subtotal,
        float $shipping,
        float $grandTotal
    ) {
        $this->total = $total;
        $this->tax = $tax;
        $this->discount = $discount;
        $this->subtotal = $subtotal;
        $this->shipping = $shipping;
        $this->grandTotal = $grandTotal;
    }

    public static function create(
        float $total,
        float $tax,
        float $discount,
        float $subtotal,
        float $shipping,
        float $grandTotal
    ): self {
        return new self($total, $tax, $discount, $subtotal, $shipping, $grandTotal);
    }

    public function total(): float
    {
        return $this->total;
    }

    public function tax(): float
    {
        return $this->tax;
    }

    public function discount(): float
    {
        return $this->discount;
    }

    public function subtotal(): float
    {
        return $this->subtotal;
    }

    public function shipping(): float
    {
        return $this->shipping;
    }

    public function grandTotal(): float
    {
        return $this->grandTotal;
    }

    public function toArray(): array
    {
        return [
            'total'      => $this->total(),
            'tax'        => $this->tax(),
            'discount'   => $this->discount(),
            'subtotal'   => $this->subtotal(),
            'shipping'   => $this->shipping(),
            'grandTotal' => $this->grandTotal()
        ];
    }
}
