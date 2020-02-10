<?php

namespace ArtishUp\Shopify\Order\Presentation\Http\Controller;

use ArtishUp\Shared\Presentation\Http\Controllers\Controller;
use ArtishUp\Shopify\Order\Application\Find\FindOrderCommand;
use ArtishUp\Shopify\Order\Application\Find\FindOrderCommandHandler;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;

class FindOrderController extends Controller
{
    private CommandBus $commandBus;

    public function __construct(FindOrderCommandHandler $commandHandler)
    {
        // Choose our method name
        $inflector = new InvokeInflector();

        // Choose our locator and register our command
        $locator = new InMemoryLocator();
        $locator->addHandler($commandHandler, FindOrderCommand::class);

        // Choose our Handler naming strategy
        $nameExtractor = new ClassNameExtractor();

        // Create the middleware that executes commands with Handlers
        $commandHandlerMiddleware = new CommandHandlerMiddleware($nameExtractor, $locator, $inflector);

        // Create the command bus, with a list of middleware
        $this->commandBus = new CommandBus([$commandHandlerMiddleware]);
    }

    public function __invoke($orderId)
    {
        $command = FindOrderCommand::create($orderId);

        $orderResponse = $this->commandBus->handle($command);

        $response = [
            'status' => true,
            'data'   => $orderResponse
        ];

        return response($response, 200);
    }
}
