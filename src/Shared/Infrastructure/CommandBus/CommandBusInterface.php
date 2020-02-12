<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Infrastructure\CommandBus;

interface CommandBusInterface
{
    public function dispatch($command, array $input = [], array $middleware = []);

    public function addHandler($command, $handler);
}
