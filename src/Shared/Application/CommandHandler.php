<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Application;

abstract class CommandHandler
{
    public abstract function handle(Command $command);
}
