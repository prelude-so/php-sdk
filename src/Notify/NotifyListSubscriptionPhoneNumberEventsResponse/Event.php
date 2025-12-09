<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumberEventsResponse\Event\State;

/**
 * @phpstan-type EventShape = array{
 *   configID: string,
 *   phoneNumber: string,
 *   source: value-of<Source>,
 *   state: value-of<State>,
 *   timestamp: \DateTimeInterface,
 *   reason?: string|null,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /**
     * The subscription configuration ID.
     */
    #[Required('config_id')]
    public string $configID;

    /**
     * The phone number in E.164 format.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * How the subscription state was changed:
     *   * `MO_KEYWORD` - User sent a keyword (STOP/START)
     *   * `API` - Changed via API
     *   * `CSV_IMPORT` - Imported from CSV
     *   * `CARRIER_DISCONNECT` - Automatically unsubscribed due to carrier disconnect
     *
     * @var value-of<Source> $source
     */
    #[Required(enum: Source::class)]
    public string $source;

    /**
     * The subscription state after this event:
     *   * `SUB` - Subscribed (user can receive marketing messages)
     *   * `UNSUB` - Unsubscribed (user has opted out)
     *
     * @var value-of<State> $state
     */
    #[Required(enum: State::class)]
    public string $state;

    /**
     * The date and time when the event occurred.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * Additional context about the state change (e.g., the keyword that was sent).
     */
    #[Optional]
    public ?string $reason;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(
     *   configID: ..., phoneNumber: ..., source: ..., state: ..., timestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)
     *   ->withConfigID(...)
     *   ->withPhoneNumber(...)
     *   ->withSource(...)
     *   ->withState(...)
     *   ->withTimestamp(...)
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
     * @param Source|value-of<Source> $source
     * @param State|value-of<State> $state
     */
    public static function with(
        string $configID,
        string $phoneNumber,
        Source|string $source,
        State|string $state,
        \DateTimeInterface $timestamp,
        ?string $reason = null,
    ): self {
        $self = new self;

        $self['configID'] = $configID;
        $self['phoneNumber'] = $phoneNumber;
        $self['source'] = $source;
        $self['state'] = $state;
        $self['timestamp'] = $timestamp;

        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * The subscription configuration ID.
     */
    public function withConfigID(string $configID): self
    {
        $self = clone $this;
        $self['configID'] = $configID;

        return $self;
    }

    /**
     * The phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * How the subscription state was changed:
     *   * `MO_KEYWORD` - User sent a keyword (STOP/START)
     *   * `API` - Changed via API
     *   * `CSV_IMPORT` - Imported from CSV
     *   * `CARRIER_DISCONNECT` - Automatically unsubscribed due to carrier disconnect
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * The subscription state after this event:
     *   * `SUB` - Subscribed (user can receive marketing messages)
     *   * `UNSUB` - Unsubscribed (user has opted out)
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The date and time when the event occurred.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Additional context about the state change (e.g., the keyword that was sent).
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
