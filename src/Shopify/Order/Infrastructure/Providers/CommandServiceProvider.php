<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\Providers;

use ArtishUp\Shopify\Order\Application\Find\FindOrderQuery;
use ArtishUp\Shopify\Order\Application\Find\FindOrderQueryHandler;
use Illuminate\Support\ServiceProvider;
use ArtishUp\Shared\Application\CommandHandler;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;

class CommandServiceProvider extends ServiceProvider
{

    public function register()
    {
    }
}
