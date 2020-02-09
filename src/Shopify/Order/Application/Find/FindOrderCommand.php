<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Application\Find;

use ArtishUp\Shared\Application\Command;

class FindOrderCommand implements Command
{
    private string $orderId;

    private function __construct(string $orderId)
    {
        $this->orderId = $orderId;
    }

    public static function create(string $orderId): self
    {
        return new self($orderId);
    }

    public static function fromArray(array $data)
    {
        return new self($data['orderId']);
    }

    public function orderId(): string
    {
        return $this->orderId;
    }

    public function toArray(): array
    {
        return [
            'orderId' => $this->orderId()
        ];
    }
}
