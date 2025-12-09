<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\State;

/**
 * @phpstan-type NotifyListSubscriptionPhoneNumberEventsResponseShape = array{
 *   events: list<Event>, nextCursor?: string|null
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
     * @param list<Event|array{
     *   configID: string,
     *   phoneNumber: string,
     *   source: value-of<Source>,
     *   state: value-of<State>,
     *   timestamp: \DateTimeInterface,
     *   reason?: string|null,
     * }> $events
     */
    public static function with(array $events, ?string $nextCursor = null): self
    {
        $obj = new self;

        $obj['events'] = $events;

        null !== $nextCursor && $obj['nextCursor'] = $nextCursor;

        return $obj;
    }

    /**
     * A list of subscription events (status changes) ordered by timestamp descending.
     *
     * @param list<Event|array{
     *   configID: string,
     *   phoneNumber: string,
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
        $obj['nextCursor'] = $nextCursor;

        return $obj;
    }
}
