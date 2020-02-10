<?php

namespace ArtishUp\Shopify\Order\Presentation\Http\Controller;

use ArtishUp\Shared\Presentation\Http\Controllers\Controller;
use ArtishUp\Shopify\Order\Application\Find\FindOrderCommand;
use ArtishUp\Shopify\Order\Application\Find\FindOrderCommandHandler;

class FindOrderController extends Controller
{
    private FindOrderCommandHandler $commandHandler;

    public function __construct(FindOrderCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    public function __invoke($orderId)
    {
        $command = FindOrderCommand::create($orderId);

        $orderResponse = $this->commandHandler->__invoke($command);

        $response = [
            'status' => true,
            'data'   => $orderResponse
        ];

        return response($response, 200);
    }
}
