<?php

declare(strict_types=1);

namespace ArtishUp\Shared\Application;

interface Command
{
    public static function fromArray(array $data);

    public function toArray(): array;
}
