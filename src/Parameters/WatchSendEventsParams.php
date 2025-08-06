<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Parameters\WatchSendEventsParams\Event;

/**
 * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @phpstan-type send_events_params = array{events: list<Event>}
 */
final class WatchSendEventsParams implements BaseModel
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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Event> $events
     */
    public static function new(array $events): self
    {
        $obj = new self;

        $obj->events = $events;

        return $obj;
    }
}
