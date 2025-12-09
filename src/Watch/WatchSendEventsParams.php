<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event;
use Prelude\Watch\WatchSendEventsParams\Event\Confidence;
use Prelude\Watch\WatchSendEventsParams\Event\Target;

/**
 * Send real-time event data from end-user interactions within your application. Events will be analyzed for proactive fraud prevention and risk scoring.
 *
 * @see Prelude\Services\WatchService::sendEvents()
 *
 * @phpstan-type WatchSendEventsParamsShape = array{
 *   events: list<Event|array{
 *     confidence: value-of<Confidence>, label: string, target: Target
 *   }>,
 * }
 */
final class WatchSendEventsParams implements BaseModel
{
    /** @use SdkModel<WatchSendEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A list of events to dispatch.
     *
     * @var list<Event> $events
     */
    #[Required(list: Event::class)]
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Event|array{
     *   confidence: value-of<Confidence>, label: string, target: Target
     * }> $events
     */
    public static function with(array $events): self
    {
        $self = new self;

        $self['events'] = $events;

        return $self;
    }

    /**
     * A list of events to dispatch.
     *
     * @param list<Event|array{
     *   confidence: value-of<Confidence>, label: string, target: Target
     * }> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }
}
