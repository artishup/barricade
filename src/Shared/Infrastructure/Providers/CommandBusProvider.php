<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Infrastructure\Providers;

use ArtishUp\Shared\Infrastructure\CommandBus\CommandBus;
use ArtishUp\Shared\Infrastructure\CommandBus\CommandBusInterface;
use ArtishUp\Shared\Infrastructure\CommandBus\LazyLocator;
use ArtishUp\Shared\Infrastructure\CommandBus\LocatorInterface;
use Illuminate\Support\ServiceProvider;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\CommandNameExtractor\CommandNameExtractor;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;

class CommandBusProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(LocatorInterface::class, LazyLocator::class);
        $this->app->bind(MethodNameInflector::class, InvokeInflector::class);
        $this->app->bind(CommandNameExtractor::class, ClassNameExtractor::class);
        $this->app->bind(CommandBusInterface::class, CommandBus::class);
    }
}
