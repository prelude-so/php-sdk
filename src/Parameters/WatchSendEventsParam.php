<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Parameters\WatchSendEventsParam\Event;

/**
 * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @phpstan-type send_events_params = array{events: list<Event>}
 */
final class WatchSendEventsParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * A list of events to dispatch.
     *
     * @var list<Event> $events
     */
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
