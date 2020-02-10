<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Order\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use ArtishUp\Shared\Application\CommandHandler;

class CommandServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(CommandHandler::class);
    }
}
