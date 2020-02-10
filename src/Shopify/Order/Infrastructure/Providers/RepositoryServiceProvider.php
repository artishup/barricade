<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use ArtishUp\Shopify\Order\Domain\Repository\FindOrderRepository;
use ArtishUp\Shopify\Order\Infrastructure\WebService\Shopify\ShopifyFindOrderRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(FindOrderRepository::class, ShopifyFindOrderRepository::class);
    }
}
