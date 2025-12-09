<?php

declare(strict_types=1);

namespace Prelude\Notify;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse\Source;
use Prelude\Notify\NotifyGetSubscriptionPhoneNumberResponse\State;

/**
 * @phpstan-type NotifyGetSubscriptionPhoneNumberResponseShape = array{
 *   configID: string,
 *   phoneNumber: string,
 *   source: value-of<Source>,
 *   state: value-of<State>,
 *   updatedAt: \DateTimeInterface,
 *   reason?: string|null,
 * }
 */
final class NotifyGetSubscriptionPhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<NotifyGetSubscriptionPhoneNumberResponseShape> */
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
     * `new NotifyGetSubscriptionPhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NotifyGetSubscriptionPhoneNumberResponse::with(
     *   configID: ..., phoneNumber: ..., source: ..., state: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NotifyGetSubscriptionPhoneNumberResponse)
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
        $obj = new self;

        $obj['configID'] = $configID;
        $obj['phoneNumber'] = $phoneNumber;
        $obj['source'] = $source;
        $obj['state'] = $state;
        $obj['updatedAt'] = $updatedAt;

        null !== $reason && $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * The subscription configuration ID.
     */
    public function withConfigID(string $configID): self
    {
        $obj = clone $this;
        $obj['configID'] = $configID;

        return $obj;
    }

    /**
     * The phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
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
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
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
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * The date and time when the subscription status was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Additional context about the state change (e.g., the keyword that was sent).
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }
}
