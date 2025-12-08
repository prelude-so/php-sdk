<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\State;

/**
 * @phpstan-type NotifyListSubscriptionPhoneNumberEventsResponseShape = array{
 *   events: list<Event>, next_cursor?: string|null
 * }
 */
final class NotifyListSubscriptionPhoneNumberEventsResponse implements BaseModel
{
    /** @use SdkModel<NotifyListSubscriptionPhoneNumberEventsResponseShape> */
    use SdkModel;

    /**
     * A list of subscription events (status changes) ordered by timestamp descending.
     *
     * @var list<Event> $events
     */
    #[Api(list: Event::class)]
    public array $events;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Api(optional: true)]
    public ?string $next_cursor;

    /**
     * `new NotifyListSubscriptionPhoneNumberEventsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyListSubscriptionPhoneNumberEventsResponse::with(events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyListSubscriptionPhoneNumberEventsResponse)->withEvents(...)
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
     *   config_id: string,
     *   phone_number: string,
     *   source: value-of<Source>,
     *   state: value-of<State>,
     *   timestamp: \DateTimeInterface,
     *   reason?: string|null,
     * }> $events
     */
    public static function with(array $events, ?string $next_cursor = null): self
    {
        $obj = new self;

        $obj['events'] = $events;

        null !== $next_cursor && $obj['next_cursor'] = $next_cursor;

        return $obj;
    }

    /**
     * A list of subscription events (status changes) ordered by timestamp descending.
     *
     * @param list<Event|array{
     *   config_id: string,
     *   phone_number: string,
     *   source: value-of<Source>,
     *   state: value-of<State>,
     *   timestamp: \DateTimeInterface,
     *   reason?: string|null,
     * }> $events
     */
    public function withEvents(array $events): self
    {
        $obj = clone $this;
        $obj['events'] = $events;

        return $obj;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $obj = clone $this;
        $obj['next_cursor'] = $nextCursor;

        return $obj;
    }
}
