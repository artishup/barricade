<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\WebService\Shopify;

use ArtishUp\Shopify\Store\Domain\Store;

class Routes
{
    public static function createOrderFulfillment($orderId): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments.json';
    }

    public static function customerOrders($customerId): string
    {
        return '/admin/customers/' . $customerId . '/orders.json';
    }

    public static function orderFulfillmentEvent($orderId, $fulfillmentId, $eventId): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments/' . $fulfillmentId . '/events/' . $eventId . '.json';
    }

    public static function orderFulfillmentEvents($orderId, $fulfillmentId): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments/' . $fulfillmentId . '/events.json';
    }

    public static function orderFulfillment($orderId, $fulfillmentId): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments/' . $fulfillmentId . '.json';
    }

    public static function orderFulfillmentsCount($orderId): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments/count.json';
    }

    public static function orderFulfillments($orderId, $limit = 50, $page = 1): string
    {
        return '/admin/orders/' . $orderId . '/fulfillments.json?limit=' . $limit . '&page=' . $page;
    }

    public static function ordersCount($status = 'any', $financialStatus = 'any', $fulfillmentStatus = 'any')
    {
        return '/admin/orders/count.json?status=' . $status
            . '&financial_status=' . $financialStatus
            . '&fulfillment_status=' . $fulfillmentStatus;
    }

    public static function order($orderId): string
    {
        return '/admin/orders/' . $orderId . '.json';
    }

    /*
    / Show orders created at or after date (format: 2014-04-25T16:15:47-04:00). -04:00 é o timezone
    / status: open, closed, cancelled, any
    / financial_status: authorized, pending, paid, partially_paid, refunded, voided, partially_refunded, any, unpaid
    / fulfillment_status: shipped, partial, unshipped, any
    */
    public static function orders($date, $limit, $page, $status, $financialStatus, $fulfillmentStatus): string
    {
        if (!$date) {
            $date = '2014-04-25T16:15:47-04:00';
        }

        return '/admin/orders.json?created_at_min=' . $date
            . '&limit=' . $limit
            . '&page=' . $page
            . '&status=' . $status
            . '&financial_status=' . $financialStatus
            . '&fulfillment_status=' . $fulfillmentStatus;
    }
}
