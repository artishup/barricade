<?php

namespace ArtishUp\Shared\Presentation\Http\Controllers;

use ArtishUp\Shared\Infrastructure\CommandBus\CommandBusInterface;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected CommandBusInterface $commandBus;

    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }
}

