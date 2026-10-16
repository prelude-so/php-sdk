<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\Channel1 as Channel;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\DevicePlatform;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\PhoneNumberCondition;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\SignalsHashStatus;
use Prelude\Verification\Phone\History\HistoryListResponse\Verification\Status;
use Prelude\Verification\Phone\History\PhoneVerificationMoney;

/**
 * One entry of the verification history. [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification) returns the full record.
 *
 * @phpstan-import-type Channel1Shape from \Prelude\Verification\Phone\History\HistoryListResponse\Verification\Channel1
 * @phpstan-import-type PhoneVerificationMoneyShape from \Prelude\Verification\Phone\History\PhoneVerificationMoney
 *
 * @phpstan-type VerificationShape = array{
 *   id: string,
 *   channels: list<Channel|Channel1Shape>,
 *   createdAt: \DateTimeInterface,
 *   delivered: bool,
 *   phoneNumber: string,
 *   status: Status|value-of<Status>,
 *   attempts?: int|null,
 *   convertedAt?: \DateTimeInterface|null,
 *   cost?: null|PhoneVerificationMoney|PhoneVerificationMoneyShape,
 *   devicePlatform?: null|DevicePlatform|value-of<DevicePlatform>,
 *   phoneNumberCondition?: null|PhoneNumberCondition|value-of<PhoneNumberCondition>,
 *   signalsHashStatus?: null|SignalsHashStatus|value-of<SignalsHashStatus>,
 * }
 */
final class Verification implements BaseModel
{
    /** @use SdkModel<VerificationShape> */
    use SdkModel;

    /**
     * The verification identifier.
     */
    #[Required]
    public string $id;

    /**
     * The channels the verification could use, and which one the end user converted through. Empty when the verification used only channels this API does not list.
     *
     * @var list<Channel> $channels
     */
    #[Required(list: Channel::class)]
    public array $channels;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Whether at least one message was reported delivered.
     */
    #[Required]
    public bool $delivered;

    /**
     * The E.164 phone number the verification targeted.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * The outcome of the verification.
     *  * `converted` - The end user submitted a valid code.
     *  * `not_converted` - The verification expired without a valid code.
     *  * `pending_check` - A code was delivered and Prelude is still waiting for a check.
     *  * `sent` - A code was sent and the verification window is still open.
     *  * `challenged` - The verification was restricted to non-SMS and non-voice channels.
     *  * `suspected_fraud` - The anti-fraud system blocked the verification.
     *  * `in_blocklist` - The phone number is on the configured block list.
     *  * `invalid_line` - The phone number is not a valid line type.
     *  * `invalid_number` - The phone number is not a valid number.
     *  * `rate_limited` - The verification was refused by a rate limit.
     *  * `expired_signals` - The SDK signals were collected too long before the request to still attest to it.
     *  * `shadowed` - The anti-fraud system flagged the verification without blocking it.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Number of messages sent for the verification, `0` when none was. Absent for sandboxed phone numbers.
     */
    #[Optional]
    public ?int $attempts;

    /**
     * When the end user submitted a valid code. Absent unless the verification converted.
     */
    #[Optional('converted_at')]
    public ?\DateTimeInterface $convertedAt;

    /**
     * Total cost of the verification. Absent when nothing was billed.
     */
    #[Optional]
    public ?PhoneVerificationMoney $cost;

    /**
     * Platform of the end-user device, when known.
     *
     * @var value-of<DevicePlatform>|null $devicePlatform
     */
    #[Optional('device_platform', enum: DevicePlatform::class)]
    public ?string $devicePlatform;

    /**
     * Whether the phone number was allow-listed, block-listed, or sandboxed at verification time.
     *
     * @var value-of<PhoneNumberCondition>|null $phoneNumberCondition
     */
    #[Optional('phone_number_condition', enum: PhoneNumberCondition::class)]
    public ?string $phoneNumberCondition;

    /**
     * Whether the SDK signals integrity check passed.
     *
     * @var value-of<SignalsHashStatus>|null $signalsHashStatus
     */
    #[Optional('signals_hash_status', enum: SignalsHashStatus::class)]
    public ?string $signalsHashStatus;

    /**
     * `new Verification()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Verification::with(
     *   id: ...,
     *   channels: ...,
     *   createdAt: ...,
     *   delivered: ...,
     *   phoneNumber: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Verification)
     *   ->withID(...)
     *   ->withChannels(...)
     *   ->withCreatedAt(...)
     *   ->withDelivered(...)
     *   ->withPhoneNumber(...)
     *   ->withStatus(...)
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
     * @param list<Channel|Channel1Shape> $channels
     * @param Status|value-of<Status> $status
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape|null $cost
     * @param DevicePlatform|value-of<DevicePlatform>|null $devicePlatform
     * @param PhoneNumberCondition|value-of<PhoneNumberCondition>|null $phoneNumberCondition
     * @param SignalsHashStatus|value-of<SignalsHashStatus>|null $signalsHashStatus
     */
    public static function with(
        string $id,
        array $channels,
        \DateTimeInterface $createdAt,
        bool $delivered,
        string $phoneNumber,
        Status|string $status,
        ?int $attempts = null,
        ?\DateTimeInterface $convertedAt = null,
        PhoneVerificationMoney|array|null $cost = null,
        DevicePlatform|string|null $devicePlatform = null,
        PhoneNumberCondition|string|null $phoneNumberCondition = null,
        SignalsHashStatus|string|null $signalsHashStatus = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['channels'] = $channels;
        $self['createdAt'] = $createdAt;
        $self['delivered'] = $delivered;
        $self['phoneNumber'] = $phoneNumber;
        $self['status'] = $status;

        null !== $attempts && $self['attempts'] = $attempts;
        null !== $convertedAt && $self['convertedAt'] = $convertedAt;
        null !== $cost && $self['cost'] = $cost;
        null !== $devicePlatform && $self['devicePlatform'] = $devicePlatform;
        null !== $phoneNumberCondition && $self['phoneNumberCondition'] = $phoneNumberCondition;
        null !== $signalsHashStatus && $self['signalsHashStatus'] = $signalsHashStatus;

        return $self;
    }

    /**
     * The verification identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The channels the verification could use, and which one the end user converted through. Empty when the verification used only channels this API does not list.
     *
     * @param list<Channel|Channel1Shape> $channels
     */
    public function withChannels(array $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Whether at least one message was reported delivered.
     */
    public function withDelivered(bool $delivered): self
    {
        $self = clone $this;
        $self['delivered'] = $delivered;

        return $self;
    }

    /**
     * The E.164 phone number the verification targeted.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The outcome of the verification.
     *  * `converted` - The end user submitted a valid code.
     *  * `not_converted` - The verification expired without a valid code.
     *  * `pending_check` - A code was delivered and Prelude is still waiting for a check.
     *  * `sent` - A code was sent and the verification window is still open.
     *  * `challenged` - The verification was restricted to non-SMS and non-voice channels.
     *  * `suspected_fraud` - The anti-fraud system blocked the verification.
     *  * `in_blocklist` - The phone number is on the configured block list.
     *  * `invalid_line` - The phone number is not a valid line type.
     *  * `invalid_number` - The phone number is not a valid number.
     *  * `rate_limited` - The verification was refused by a rate limit.
     *  * `expired_signals` - The SDK signals were collected too long before the request to still attest to it.
     *  * `shadowed` - The anti-fraud system flagged the verification without blocking it.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Number of messages sent for the verification, `0` when none was. Absent for sandboxed phone numbers.
     */
    public function withAttempts(int $attempts): self
    {
        $self = clone $this;
        $self['attempts'] = $attempts;

        return $self;
    }

    /**
     * When the end user submitted a valid code. Absent unless the verification converted.
     */
    public function withConvertedAt(\DateTimeInterface $convertedAt): self
    {
        $self = clone $this;
        $self['convertedAt'] = $convertedAt;

        return $self;
    }

    /**
     * Total cost of the verification. Absent when nothing was billed.
     *
     * @param PhoneVerificationMoney|PhoneVerificationMoneyShape $cost
     */
    public function withCost(PhoneVerificationMoney|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Platform of the end-user device, when known.
     *
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform
     */
    public function withDevicePlatform(
        DevicePlatform|string $devicePlatform
    ): self {
        $self = clone $this;
        $self['devicePlatform'] = $devicePlatform;

        return $self;
    }

    /**
     * Whether the phone number was allow-listed, block-listed, or sandboxed at verification time.
     *
     * @param PhoneNumberCondition|value-of<PhoneNumberCondition> $phoneNumberCondition
     */
    public function withPhoneNumberCondition(
        PhoneNumberCondition|string $phoneNumberCondition
    ): self {
        $self = clone $this;
        $self['phoneNumberCondition'] = $phoneNumberCondition;

        return $self;
    }

    /**
     * Whether the SDK signals integrity check passed.
     *
     * @param SignalsHashStatus|value-of<SignalsHashStatus> $signalsHashStatus
     */
    public function withSignalsHashStatus(
        SignalsHashStatus|string $signalsHashStatus
    ): self {
        $self = clone $this;
        $self['signalsHashStatus'] = $signalsHashStatus;

        return $self;
    }
}
