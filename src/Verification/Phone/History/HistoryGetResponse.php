<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\Phone\History\HistoryGetResponse\BlockReason;
use Prelude\Verification\Phone\History\HistoryGetResponse\DevicePlatform;
use Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle;
use Prelude\Verification\Phone\History\HistoryGetResponse\PhoneNumberCondition;
use Prelude\Verification\Phone\History\HistoryGetResponse\PhoneNumberCurrentCondition;
use Prelude\Verification\Phone\History\HistoryGetResponse\Signals;
use Prelude\Verification\Phone\History\HistoryGetResponse\SignalsHashStatus;
use Prelude\Verification\Phone\History\HistoryGetResponse\Status;

/**
 * A verification and everything Prelude recorded about it.
 *
 * @phpstan-import-type PhoneVerificationCarrierShape from \Prelude\Verification\Phone\History\PhoneVerificationCarrier
 * @phpstan-import-type LifecycleShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle
 * @phpstan-import-type SignalsShape from \Prelude\Verification\Phone\History\HistoryGetResponse\Signals
 *
 * @phpstan-type HistoryGetResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface,
 *   phoneNumber: string,
 *   status: Status|value-of<Status>,
 *   appVersion?: string|null,
 *   blockReasons?: list<BlockReason|value-of<BlockReason>>|null,
 *   carrier?: null|PhoneVerificationCarrier|PhoneVerificationCarrierShape,
 *   correlationID?: string|null,
 *   deviceModel?: string|null,
 *   devicePlatform?: null|DevicePlatform|value-of<DevicePlatform>,
 *   ipAddress?: string|null,
 *   ipAddressRegion?: string|null,
 *   ipDistanceMeters?: int|null,
 *   lifecycle?: null|Lifecycle|LifecycleShape,
 *   phoneNumberCondition?: null|PhoneNumberCondition|value-of<PhoneNumberCondition>,
 *   phoneNumberCurrentCondition?: null|PhoneNumberCurrentCondition|value-of<PhoneNumberCurrentCondition>,
 *   phoneNumberRegion?: string|null,
 *   signals?: null|Signals|SignalsShape,
 *   signalsHashStatus?: null|SignalsHashStatus|value-of<SignalsHashStatus>,
 *   templateID?: string|null,
 * }
 */
final class HistoryGetResponse implements BaseModel
{
    /** @use SdkModel<HistoryGetResponseShape> */
    use SdkModel;

    /**
     * The verification identifier.
     */
    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('expires_at')]
    public \DateTimeInterface $expiresAt;

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
     *  * `expired_signals` - The SDK signals were collected too long before the request.
     *  * `shadowed` - The anti-fraud system flagged the verification without blocking it.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Version of your application, when known.
     */
    #[Optional('app_version')]
    public ?string $appVersion;

    /**
     * Why the anti-fraud system blocked the verification. Empty unless it did.
     *  * `behavioral_pattern` - The phone number past behavior during verification flows exhibits suspicious patterns.
     *  * `device_attribute` - The end-user device reported attributes associated with fraud or emulation.
     *  * `fraud_database` - The phone number appears in a fraud database.
     *  * `location_discrepancy` - The phone number region and the observed location disagree.
     *  * `missing_signals` - The verification expected Prelude SDK signals and none arrived.
     *  * `network_fingerprint` - The network fingerprint matches known fraudulent traffic.
     *  * `poor_conversion_history` - The phone number rarely completes the verifications it starts.
     *  * `prefix_concentration` - The phone number is part of a range known to be associated with suspicious activity patterns.
     *  * `repeated_number` - The phone number was used far more often than normal traffic would explain.
     *  * `suspected_request_tampering` - The SDK signals were altered or expired between collection and use.
     *  * `suspicious_ip_address` - The originating IP address is associated with suspicious activity.
     *  * `temporary_phone_number` - The phone number is known to be a temporary or disposable number.
     *
     * @var list<value-of<BlockReason>>|null $blockReasons
     */
    #[Optional('block_reasons', list: BlockReason::class)]
    public ?array $blockReasons;

    /**
     * The end user's mobile network.
     */
    #[Optional]
    public ?PhoneVerificationCarrier $carrier;

    /**
     * The correlation identifier you supplied when creating the verification.
     */
    #[Optional('correlation_id')]
    public ?string $correlationID;

    /**
     * Model of the end-user device, when known.
     */
    #[Optional('device_model')]
    public ?string $deviceModel;

    /**
     * Platform of the end-user device, when known.
     *
     * @var value-of<DevicePlatform>|null $devicePlatform
     */
    #[Optional('device_platform', enum: DevicePlatform::class)]
    public ?string $devicePlatform;

    /**
     * IP address the verification was created from.
     */
    #[Optional('ip_address')]
    public ?string $ipAddress;

    /**
     * ISO 3166-1 alpha-2 region of the caller's IP address.
     */
    #[Optional('ip_address_region')]
    public ?string $ipAddressRegion;

    /**
     * Distance between the phone number region and the IP location.
     */
    #[Optional('ip_distance_meters')]
    public ?int $ipDistanceMeters;

    /**
     * Chronological timeline of the verification: creation, message attempts with delivery events, code checks and signals reception. Omitted when Prelude holds no timeline for the verification.
     */
    #[Optional]
    public ?Lifecycle $lifecycle;

    /**
     * Whether the phone number was allow-listed, block-listed, or sandboxed at verification time.
     *
     * @var value-of<PhoneNumberCondition>|null $phoneNumberCondition
     */
    #[Optional('phone_number_condition', enum: PhoneNumberCondition::class)]
    public ?string $phoneNumberCondition;

    /**
     * Whether the phone number is currently allow-listed, block-listed, or sandboxed.
     *
     * @var value-of<PhoneNumberCurrentCondition>|null $phoneNumberCurrentCondition
     */
    #[Optional(
        'phone_number_current_condition',
        enum: PhoneNumberCurrentCondition::class
    )]
    public ?string $phoneNumberCurrentCondition;

    /**
     * ISO 3166-1 alpha-2 region of the phone number.
     */
    #[Optional('phone_number_region')]
    public ?string $phoneNumberRegion;

    /**
     * The anti-fraud signals you forwarded when creating the verification.
     */
    #[Optional]
    public ?Signals $signals;

    /**
     * Whether the SDK signals integrity check passed.
     *
     * @var value-of<SignalsHashStatus>|null $signalsHashStatus
     */
    #[Optional('signals_hash_status', enum: SignalsHashStatus::class)]
    public ?string $signalsHashStatus;

    /**
     * The template used for this verification.
     */
    #[Optional('template_id')]
    public ?string $templateID;

    /**
     * `new HistoryGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HistoryGetResponse::with(
     *   id: ..., createdAt: ..., expiresAt: ..., phoneNumber: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HistoryGetResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
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
     * @param Status|value-of<Status> $status
     * @param list<BlockReason|value-of<BlockReason>>|null $blockReasons
     * @param PhoneVerificationCarrier|PhoneVerificationCarrierShape|null $carrier
     * @param DevicePlatform|value-of<DevicePlatform>|null $devicePlatform
     * @param Lifecycle|LifecycleShape|null $lifecycle
     * @param PhoneNumberCondition|value-of<PhoneNumberCondition>|null $phoneNumberCondition
     * @param PhoneNumberCurrentCondition|value-of<PhoneNumberCurrentCondition>|null $phoneNumberCurrentCondition
     * @param Signals|SignalsShape|null $signals
     * @param SignalsHashStatus|value-of<SignalsHashStatus>|null $signalsHashStatus
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $expiresAt,
        string $phoneNumber,
        Status|string $status,
        ?string $appVersion = null,
        ?array $blockReasons = null,
        PhoneVerificationCarrier|array|null $carrier = null,
        ?string $correlationID = null,
        ?string $deviceModel = null,
        DevicePlatform|string|null $devicePlatform = null,
        ?string $ipAddress = null,
        ?string $ipAddressRegion = null,
        ?int $ipDistanceMeters = null,
        Lifecycle|array|null $lifecycle = null,
        PhoneNumberCondition|string|null $phoneNumberCondition = null,
        PhoneNumberCurrentCondition|string|null $phoneNumberCurrentCondition = null,
        ?string $phoneNumberRegion = null,
        Signals|array|null $signals = null,
        SignalsHashStatus|string|null $signalsHashStatus = null,
        ?string $templateID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['phoneNumber'] = $phoneNumber;
        $self['status'] = $status;

        null !== $appVersion && $self['appVersion'] = $appVersion;
        null !== $blockReasons && $self['blockReasons'] = $blockReasons;
        null !== $carrier && $self['carrier'] = $carrier;
        null !== $correlationID && $self['correlationID'] = $correlationID;
        null !== $deviceModel && $self['deviceModel'] = $deviceModel;
        null !== $devicePlatform && $self['devicePlatform'] = $devicePlatform;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $ipAddressRegion && $self['ipAddressRegion'] = $ipAddressRegion;
        null !== $ipDistanceMeters && $self['ipDistanceMeters'] = $ipDistanceMeters;
        null !== $lifecycle && $self['lifecycle'] = $lifecycle;
        null !== $phoneNumberCondition && $self['phoneNumberCondition'] = $phoneNumberCondition;
        null !== $phoneNumberCurrentCondition && $self['phoneNumberCurrentCondition'] = $phoneNumberCurrentCondition;
        null !== $phoneNumberRegion && $self['phoneNumberRegion'] = $phoneNumberRegion;
        null !== $signals && $self['signals'] = $signals;
        null !== $signalsHashStatus && $self['signalsHashStatus'] = $signalsHashStatus;
        null !== $templateID && $self['templateID'] = $templateID;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

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
     *  * `expired_signals` - The SDK signals were collected too long before the request.
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
     * Version of your application, when known.
     */
    public function withAppVersion(string $appVersion): self
    {
        $self = clone $this;
        $self['appVersion'] = $appVersion;

        return $self;
    }

    /**
     * Why the anti-fraud system blocked the verification. Empty unless it did.
     *  * `behavioral_pattern` - The phone number past behavior during verification flows exhibits suspicious patterns.
     *  * `device_attribute` - The end-user device reported attributes associated with fraud or emulation.
     *  * `fraud_database` - The phone number appears in a fraud database.
     *  * `location_discrepancy` - The phone number region and the observed location disagree.
     *  * `missing_signals` - The verification expected Prelude SDK signals and none arrived.
     *  * `network_fingerprint` - The network fingerprint matches known fraudulent traffic.
     *  * `poor_conversion_history` - The phone number rarely completes the verifications it starts.
     *  * `prefix_concentration` - The phone number is part of a range known to be associated with suspicious activity patterns.
     *  * `repeated_number` - The phone number was used far more often than normal traffic would explain.
     *  * `suspected_request_tampering` - The SDK signals were altered or expired between collection and use.
     *  * `suspicious_ip_address` - The originating IP address is associated with suspicious activity.
     *  * `temporary_phone_number` - The phone number is known to be a temporary or disposable number.
     *
     * @param list<BlockReason|value-of<BlockReason>> $blockReasons
     */
    public function withBlockReasons(array $blockReasons): self
    {
        $self = clone $this;
        $self['blockReasons'] = $blockReasons;

        return $self;
    }

    /**
     * The end user's mobile network.
     *
     * @param PhoneVerificationCarrier|PhoneVerificationCarrierShape $carrier
     */
    public function withCarrier(PhoneVerificationCarrier|array $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * The correlation identifier you supplied when creating the verification.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * Model of the end-user device, when known.
     */
    public function withDeviceModel(string $deviceModel): self
    {
        $self = clone $this;
        $self['deviceModel'] = $deviceModel;

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
     * IP address the verification was created from.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 region of the caller's IP address.
     */
    public function withIPAddressRegion(string $ipAddressRegion): self
    {
        $self = clone $this;
        $self['ipAddressRegion'] = $ipAddressRegion;

        return $self;
    }

    /**
     * Distance between the phone number region and the IP location.
     */
    public function withIPDistanceMeters(int $ipDistanceMeters): self
    {
        $self = clone $this;
        $self['ipDistanceMeters'] = $ipDistanceMeters;

        return $self;
    }

    /**
     * Chronological timeline of the verification: creation, message attempts with delivery events, code checks and signals reception. Omitted when Prelude holds no timeline for the verification.
     *
     * @param Lifecycle|LifecycleShape $lifecycle
     */
    public function withLifecycle(Lifecycle|array $lifecycle): self
    {
        $self = clone $this;
        $self['lifecycle'] = $lifecycle;

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
     * Whether the phone number is currently allow-listed, block-listed, or sandboxed.
     *
     * @param PhoneNumberCurrentCondition|value-of<PhoneNumberCurrentCondition> $phoneNumberCurrentCondition
     */
    public function withPhoneNumberCurrentCondition(
        PhoneNumberCurrentCondition|string $phoneNumberCurrentCondition
    ): self {
        $self = clone $this;
        $self['phoneNumberCurrentCondition'] = $phoneNumberCurrentCondition;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 region of the phone number.
     */
    public function withPhoneNumberRegion(string $phoneNumberRegion): self
    {
        $self = clone $this;
        $self['phoneNumberRegion'] = $phoneNumberRegion;

        return $self;
    }

    /**
     * The anti-fraud signals you forwarded when creating the verification.
     *
     * @param Signals|SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

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

    /**
     * The template used for this verification.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }
}
