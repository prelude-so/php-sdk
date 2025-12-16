<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\State;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   configID: string,
 *   phoneNumber: string,
 *   source: Source|value-of<Source>,
 *   state: State|value-of<State>,
 *   updatedAt: \DateTimeInterface,
 *   reason?: string|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
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
     * The subscription state:
     *   * `SUB` - Subscribed (user can receive marketing messages)
     *   * `UNSUB` - Unsubscribed (user has opted out)
     *
     * @var value-of<State> $state
     */
    #[Required(enum: State::class)]
    public string $state;

    /**
     * The date and time when the subscription status was last updated.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Additional context about the state change (e.g., the keyword that was sent).
     */
    #[Optional]
    public ?string $reason;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(
     *   configID: ..., phoneNumber: ..., source: ..., state: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumber)
     *   ->withConfigID(...)
     *   ->withPhoneNumber(...)
     *   ->withSource(...)
     *   ->withState(...)
     *   ->withUpdatedAt(...)
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
        \DateTimeInterface $updatedAt,
        ?string $reason = null,
    ): self {
        $self = new self;

        $self['configID'] = $configID;
        $self['phoneNumber'] = $phoneNumber;
        $self['source'] = $source;
        $self['state'] = $state;
        $self['updatedAt'] = $updatedAt;

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
     * The subscription state:
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
     * The date and time when the subscription status was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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
