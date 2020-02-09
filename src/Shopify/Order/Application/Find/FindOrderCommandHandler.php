<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Application\Find;

use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;
use ArtishUp\Shopify\Order\Domain\Repository\FindOrderRepository;

final class FindOrderCommandHandler
{
    private FindOrderRepository $findOrderRepository;

    public function __construct(FindOrderRepository $findOrderRepository)
    {
        $this->findOrderRepository = $findOrderRepository;
    }

    public function handle(FindOrderCommand $command)
    {
        $orderId = OrderId::create($command->orderId());

        $order = $this->findOrderRepository->find($orderId);

        return FindOrderResponse::create($order);
    }
}
