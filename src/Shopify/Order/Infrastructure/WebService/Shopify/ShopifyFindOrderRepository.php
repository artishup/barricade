<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\WebService\Shopify;

use ArtishUp\Shopify\Order\Domain\Entity\Customer;
use ArtishUp\Shopify\Order\Domain\Entity\Items;
use ArtishUp\Shopify\Order\Domain\Entity\Product;
use ArtishUp\Shopify\Order\Domain\Entity\ShippingAddress;
use ArtishUp\Shopify\Order\Domain\Entity\Total;
use ArtishUp\Shopify\Order\Domain\ValueObject\ProductId;
use ArtishUp\Shopify\Store\Domain\Store;
use ArtishUp\Shopify\Order\Domain\Entity\Order;
use ArtishUp\Shopify\Order\Domain\ValueObject\OrderId;
use ArtishUp\Shopify\Order\Domain\Repository\FindOrderRepository;
use ArtishUp\Shopify\Store\Infrastructure\WebService\Shopify\ShopifyRepositoryAbstract;

class ShopifyFindOrderRepository extends ShopifyRepositoryAbstract implements FindOrderRepository
{

    public function find(Store $store, OrderId $orderId): ?Order
    {
        $url = Routes::order($orderId->value());

        $response = $this->submit($store->apiUrl() . $url, 'GET');

        if (!$response['success']) {
            //TODO: exception
            return null;
        }

        $orderResponse = $response['data']['order'];

        $customer = Customer::crete(
            $orderResponse['customer']['first_name'],
            $orderResponse['customer']['last_name'],
            $orderResponse['customer']['email']
        );

        $shippingLines = $orderResponse['shipping_lines'];
        $shippingTotal = 0;
        foreach ($shippingLines as $shippingLine) {
            $shippingTotal += $shippingLine['price'];
        }

        $total = Total::create(
            (float) $orderResponse['total_line_items_price'],
            (float) $orderResponse['total_tax'],
            (float) $orderResponse['total_discounts'],
            (float) $orderResponse['subtotal_price'],
            (float) $shippingTotal,
            (float) $orderResponse['total_price']
        );

        $shippingAddress = ShippingAddress::create(
            $orderResponse['shipping_address']['address1'],
            $orderResponse['shipping_address']['address2'],
            $orderResponse['shipping_address']['city'],
            $orderResponse['shipping_address']['province_code'],
            $orderResponse['shipping_address']['country_code'],
            $orderResponse['shipping_address']['zip']
        );


        $orderItems = [];
        $items = $orderResponse['line_items'];

        foreach ($items as $item) {
            $orderItems[] = Product::create(
                ProductId::create((string) $item['id']),
                (string) $item['title'],
                (string) $item['sku'],
                (string) $item['variant_title'],
                (int) $item['quantity'],
                (float) $item['price']
            );
        }

        return Order::create(
            OrderId::create((string) $orderResponse['id']),
            $customer,
            $shippingAddress,
            new Items($orderItems),
            $total
        );
    }
}
