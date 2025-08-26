<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event;

/**
 * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @phpstan-type watch_send_events_params = array{events: list<Event>}
 */
final class WatchSendEventsParams implements BaseModel
{
    /** @use SdkModel<watch_send_events_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A list of events to dispatch.
     *
     * @var list<Event> $events
     */
    #[Api(list: Event::class)]
    public array $events;

    /**
     * `new WatchSendEventsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchSendEventsParams::with(events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchSendEventsParams)->withEvents(...)
     * ```
     */
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
    public static function with(array $events): self
    {
        $obj = new self;

        $obj->events = $events;

        return $obj;
    }

    /**
     * A list of events to dispatch.
     *
     * @param list<Event> $events
     */
    public function withEvents(array $events): self
    {
        $obj = clone $this;
        $obj->events = $events;

        return $obj;
    }
}
