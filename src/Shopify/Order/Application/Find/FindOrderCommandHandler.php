<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Application\Find;

use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;
use ArtishUp\Shopify\Order\Domain\Repository\FindOrderRepository;
use ArtishUp\Shopify\Store\Domain\Store;

final class FindOrderCommandHandler
{
    private FindOrderRepository $findOrderRepository;

    public function __construct(FindOrderRepository $findOrderRepository)
    {
        $this->findOrderRepository = $findOrderRepository;
    }

    public function __invoke(FindOrderCommand $command)
    {
        $orderId = OrderId::create($command->orderId());

        $store = Store::fromArray(config('shopify.store'));

        $order = $this->findOrderRepository->find($store, $orderId);

        return FindOrderResponse::create($order);
    }
}
