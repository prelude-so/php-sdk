<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Serde\ListOf;
use Prelude\Parameters\WatchSendEventsParam\Event;

final class WatchSendEventsParam implements BaseModel
{
    use Model;
    use Params;

    /** @var list<Event> $events */
    #[Api(type: new ListOf(Event::class))]
    public array $events;

    /**
     * You must use named parameters to construct this object.
     *
     * @param list<Event> $events
     */
    final public function __construct(array $events)
    {
        self::introspect();

        $this->events = $events;
    }
}
