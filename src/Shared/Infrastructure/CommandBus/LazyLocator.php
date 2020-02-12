<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Infrastructure\CommandBus;

use League\Tactician\Exception\MissingHandlerException;

class LazyLocator implements LocatorInterface
{
    protected $handlers;

    public function addHandler($handler, $commandClassName)
    {
        $handlerInstance = app($handler);
        $this->handlers[$commandClassName] = $handlerInstance;
    }

    public function addHandlers(array $commandClassToHandlerMap)
    {
        foreach ($commandClassToHandlerMap as $commandClass => $handler) {
            $this->addHandler($handler, $commandClass);
        }
    }

    public function getHandlerForCommand($commandName)
    {
        if (!isset($this->handlers[$commandName])) {
            throw MissingHandlerException::forCommand($commandName);
        }

        return $this->handlers[$commandName];
    }
}
