<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event;

/**
 * @phpstan-import-type EventShape from \Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event
 *
 * @phpstan-type NotifyListSubscriptionPhoneNumberEventsResponseShape = array{
 *   events: list<EventShape>, nextCursor?: string|null
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
    #[Required(list: Event::class)]
    public array $events;

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    #[Optional('next_cursor')]
    public ?string $nextCursor;

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
     * @param list<EventShape> $events
     */
    public static function with(array $events, ?string $nextCursor = null): self
    {
        $self = new self;

        $self['events'] = $events;

        null !== $nextCursor && $self['nextCursor'] = $nextCursor;

        return $self;
    }

    /**
     * A list of subscription events (status changes) ordered by timestamp descending.
     *
     * @param list<EventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * Pagination cursor for the next page of results. Omitted if there are no more pages.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $self = clone $this;
        $self['nextCursor'] = $nextCursor;

        return $self;
    }
}
