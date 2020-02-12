<?php

namespace ArtishUp\Shopify\Order\Presentation\Http\Controller;

use ArtishUp\Shared\Presentation\Http\Controllers\Controller;
use ArtishUp\Shopify\Order\Application\Find\FindOrderQuery;
use ArtishUp\Shopify\Order\Application\Find\FindOrderQueryHandler;

class FindOrderController extends Controller
{

    public function __invoke($orderId)
    {
        $this->commandBus->addHandler(FindOrderQuery::class, FindOrderQueryHandler::class);

        $orderResponse = $this->commandBus->dispatch(FindOrderQuery::create($orderId));

        $response = [
            'status' => true,
            'data'   => $orderResponse
        ];

        return response($response, 200);
    }
}
