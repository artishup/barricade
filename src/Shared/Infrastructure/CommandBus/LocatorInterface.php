<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Infrastructure\CommandBus;

use League\Tactician\Handler\Locator\HandlerLocator;

interface LocatorInterface extends HandlerLocator
{
    public function addHandler($handler, $commandClassName);

    public function addHandlers(array $commandClassToHandlerMap);
}
