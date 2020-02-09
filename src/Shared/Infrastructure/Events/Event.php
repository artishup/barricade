<?php

namespace ArtishUp\Shared\Infrastructure\Events;

use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use SerializesModels;
}
