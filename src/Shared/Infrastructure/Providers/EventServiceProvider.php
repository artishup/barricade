<?php

namespace ArtishUp\Shared\Infrastructure\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \ArtishUp\Shared\Infrastructure\Events\ExampleEvent::class => [
            \ArtishUp\Shared\Infrastructure\Listeners\ExampleListener::class,
        ],
    ];
}
