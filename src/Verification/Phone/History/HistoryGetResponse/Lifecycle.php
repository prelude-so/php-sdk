<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;
use Prelude\Verification\Phone\History\PhoneVerificationMoney;

/**
 * Chronological timeline of the verification: creation, message attempts with delivery events, code checks and signals reception. Omitted when Prelude holds no timeline for the verification.
 *
 * @phpstan-import-type EventShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event
 * @phpstan-import-type PhoneVerificationMoneyShape from \Prelude\Verification\Phone\History\PhoneVerificationMoney
 *
 * @phpstan-type LifecycleShape = array{
 *   events: list<Event|EventShape>,
 *   totalCost?: null|PhoneVerificationMoney|PhoneVerificationMoneyShape,
 *   undeliverableRouteCount?: int|null,
 * }
 */
final class Lifecycle implements BaseModel
{
    /** @use SdkModel<LifecycleShape> */
    use SdkModel;

    /** @var list<Event> $events */
    #[Required(list: Event::class)]
    public array $events;

    #[Optional('total_cost')]
    public ?PhoneVerificationMoney $totalCost;

    /**
     * How many times the message was reported undeliverable by independent routes. Above zero usually means the phone number is incorrect or the device unreachable.
     */
    #[Optional('undeliverable_route_count')]
    public ?int $undeliverableRouteCount;

    /**
     * `new Lifecycle()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Lifecycle::with(events: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Lifecycle)->withEvents(...)
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
     * @param list<Event|EventShape> $events
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape|null $totalCost
     */
    public static function with(
        array $events,
        PhoneVerificationMoney|array|null $totalCost = null,
        ?int $undeliverableRouteCount = null,
    ): self {
        $self = new self;

        $self['events'] = $events;

        null !== $totalCost && $self['totalCost'] = $totalCost;
        null !== $undeliverableRouteCount && $self['undeliverableRouteCount'] = $undeliverableRouteCount;

        return $self;
    }

    /**
     * @param list<Event|EventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape $totalCost
     */
    public function withTotalCost(PhoneVerificationMoney|array $totalCost): self
    {
        $self = clone $this;
        $self['totalCost'] = $totalCost;

        return $self;
    }

    /**
     * How many times the message was reported undeliverable by independent routes. Above zero usually means the phone number is incorrect or the device unreachable.
     */
    public function withUndeliverableRouteCount(
        int $undeliverableRouteCount
    ): self {
        $self = clone $this;
        $self['undeliverableRouteCount'] = $undeliverableRouteCount;

        return $self;
    }
}
