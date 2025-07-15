<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\Watch\SendEventsParams\Event;

class SendEventsParams implements BaseModel
{
    use Model;
    use Params;

    /** @var list<Event> $events */
    #[Api(type: new ListOf(Event::class))]
    public array $events;
}

SendEventsParams::_loadMetadata();
