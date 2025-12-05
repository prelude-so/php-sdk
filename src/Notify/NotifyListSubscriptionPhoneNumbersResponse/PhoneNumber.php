<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\Source;
use Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber\State;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   config_id: string,
 *   phone_number: string,
 *   source: value-of<Source>,
 *   state: value-of<State>,
 *   updated_at: \DateTimeInterface,
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
    #[Api]
    public string $config_id;

    /**
     * The phone number in E.164 format.
     */
    #[Api]
    public string $phone_number;

    /**
     * How the subscription state was changed:
     *   * `MO_KEYWORD` - User sent a keyword (STOP/START)
     *   * `API` - Changed via API
     *   * `CSV_IMPORT` - Imported from CSV
     *   * `CARRIER_DISCONNECT` - Automatically unsubscribed due to carrier disconnect
     *
     * @var value-of<Source> $source
     */
    #[Api(enum: Source::class)]
    public string $source;

    /**
     * The subscription state:
     *   * `SUB` - Subscribed (user can receive marketing messages)
     *   * `UNSUB` - Unsubscribed (user has opted out)
     *
     * @var value-of<State> $state
     */
    #[Api(enum: State::class)]
    public string $state;

    /**
     * The date and time when the subscription status was last updated.
     */
    #[Api]
    public \DateTimeInterface $updated_at;

    /**
     * Additional context about the state change (e.g., the keyword that was sent).
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(
     *   config_id: ..., phone_number: ..., source: ..., state: ..., updated_at: ...
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
        string $config_id,
        string $phone_number,
        Source|string $source,
        State|string $state,
        \DateTimeInterface $updated_at,
        ?string $reason = null,
    ): self {
        $obj = new self;

        $obj['config_id'] = $config_id;
        $obj['phone_number'] = $phone_number;
        $obj['source'] = $source;
        $obj['state'] = $state;
        $obj['updated_at'] = $updated_at;

        null !== $reason && $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * The subscription configuration ID.
     */
    public function withConfigID(string $configID): self
    {
        $obj = clone $this;
        $obj['config_id'] = $configID;

        return $obj;
    }

    /**
     * The phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['updated_at'] = $updatedAt;

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
