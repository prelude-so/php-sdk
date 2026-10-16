<?php

declare(strict_types=1);

namespace Prelude\Verification;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Verification\VerificationNewResponse\Channel;
use Prelude\Verification\VerificationNewResponse\Metadata;
use Prelude\Verification\VerificationNewResponse\Method;
use Prelude\Verification\VerificationNewResponse\Reason;
use Prelude\Verification\VerificationNewResponse\RiskFactor;
use Prelude\Verification\VerificationNewResponse\Silent;
use Prelude\Verification\VerificationNewResponse\Status;

/**
 * @phpstan-import-type MetadataShape from \Prelude\Verification\VerificationNewResponse\Metadata
 * @phpstan-import-type SilentShape from \Prelude\Verification\VerificationNewResponse\Silent
 *
 * @phpstan-type VerificationNewResponseShape = array{
 *   id: string,
 *   method: Method|value-of<Method>,
 *   status: Status|value-of<Status>,
 *   channels?: list<Channel|value-of<Channel>>|null,
 *   metadata?: null|Metadata|MetadataShape,
 *   reason?: null|Reason|value-of<Reason>,
 *   requestID?: string|null,
 *   riskFactors?: list<RiskFactor|value-of<RiskFactor>>|null,
 *   silent?: null|Silent|SilentShape,
 * }
 */
final class VerificationNewResponse implements BaseModel
{
    /** @use SdkModel<VerificationNewResponseShape> */
    use SdkModel;

    /**
     * The verification identifier.
     */
    #[Required]
    public string $id;

    /**
     * The method used for verifying this phone number.
     *
     * @var value-of<Method> $method
     */
    #[Required(enum: Method::class)]
    public string $method;

    /**
     * The status of the verification.
     *  * `success` - A new verification window was created.
     *  * `retry` - A new attempt was created for an existing verification window.
     *  * `challenged` - The verification is suspicious and is restricted to non-SMS and non-voice channels only. This mode must be enabled for your customer account by Prelude support.
     *  * `blocked` - The verification was blocked.
     *  * `shadow_blocked` - The verification triggered a block rule but the decision was not enforced; this is used to dry-run anti-fraud configuration. This mode must be enabled for your customer account by Prelude support.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The ordered sequence of channels to be used for verification.
     *
     * @var list<value-of<Channel>>|null $channels
     */
    #[Optional(list: Channel::class)]
    public ?array $channels;

    /**
     * The metadata for this verification.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * The reason why the verification was blocked. Only present when status is "blocked" or "shadow_blocked".
     *  * `expired_signature` - The signature of the SDK signals is expired. They should be sent within
     *    the hour following their collection.
     *  * `in_block_list` - The phone number is part of the configured block list.
     *  * `invalid_phone_line` - The phone number is not a valid line number (e.g. landline).
     *  * `invalid_phone_number` - The phone number is not a valid phone number (e.g. unallocated range).
     *  * `invalid_signature` - The SDK signature did not verify, so the request cannot be attributed to the device it claims to come from.
     *  * `repeated_attempts` - The phone number exceeded the allowed number of verification attempts in a short period.
     *  * `suspicious` - The verification attempt was deemed suspicious by the anti-fraud system.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Optional(enum: Reason::class)]
    public ?string $reason;

    #[Optional('request_id')]
    public ?string $requestID;

    /**
     * The risk factors that contributed to the verification being blocked. Only present when status is "blocked" or "shadow_blocked" and the anti-fraud system detected specific risk signals.
     *  * `automation_signature` - The request appears to come from an automated client rather than a person.
     *  * `carrier_not_permitted` - The destination carrier is one this account does not accept traffic for.
     *  * `client_fingerprint_mismatch` - The client does not appear to be the platform it identifies itself as.
     *  * `custom_policy` - A rule configured for your account matched this request.
     *  * `device_emulator` - The request appears to come from an emulator rather than a physical device.
     *  * `device_not_permitted` - The device platform is one your account blocks.
     *  * `device_reuse` - One device is driving verifications for an unusual number of phone numbers.
     *  * `expired_signals` - The SDK signals were collected too long before the request to still attest to it.
     *  * `fraud_database` - The phone number is flagged in one or more of the fraud databases Prelude consults.
     *  * `invalid_signature` - The SDK signature did not verify, so the request cannot be attributed to the device it claims to come from.
     *  * `ip_concentration` - The request shares its origin with an unusual volume of other verifications.
     *  * `ip_reputation` - The originating IP address is not trusted.
     *  * `location_mismatch` - The network location and the phone number's country are inconsistent.
     *  * `missing_signals` - The verification expected Prelude SDK signals and none arrived.
     *  * `number_range_abuse` - The phone number belongs to a range currently associated with abuse.
     *  * `poor_conversion_history` - Traffic resembling this request rarely completes a verification.
     *  * `proxy_network` - The request did not arrive over the subscriber's own access network.
     *  * `repeated_attempts` - The phone number exceeded the allowed number of verification attempts in a short period.
     *  * `temporary_phone_number` - The phone number belongs to a disposable or short-lived numbering service.
     *
     * @var list<value-of<RiskFactor>>|null $riskFactors
     */
    #[Optional('risk_factors', list: RiskFactor::class)]
    public ?array $riskFactors;

    /**
     * The silent verification specific properties.
     */
    #[Optional]
    public ?Silent $silent;

    /**
     * `new VerificationNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationNewResponse::with(id: ..., method: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationNewResponse)->withID(...)->withMethod(...)->withStatus(...)
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
     * @param Method|value-of<Method> $method
     * @param Status|value-of<Status> $status
     * @param list<Channel|value-of<Channel>>|null $channels
     * @param Metadata|MetadataShape|null $metadata
     * @param Reason|value-of<Reason>|null $reason
     * @param list<RiskFactor|value-of<RiskFactor>>|null $riskFactors
     * @param Silent|SilentShape|null $silent
     */
    public static function with(
        string $id,
        Method|string $method,
        Status|string $status,
        ?array $channels = null,
        Metadata|array|null $metadata = null,
        Reason|string|null $reason = null,
        ?string $requestID = null,
        ?array $riskFactors = null,
        Silent|array|null $silent = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['method'] = $method;
        $self['status'] = $status;

        null !== $channels && $self['channels'] = $channels;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $reason && $self['reason'] = $reason;
        null !== $requestID && $self['requestID'] = $requestID;
        null !== $riskFactors && $self['riskFactors'] = $riskFactors;
        null !== $silent && $self['silent'] = $silent;

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
     * The method used for verifying this phone number.
     *
     * @param Method|value-of<Method> $method
     */
    public function withMethod(Method|string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }

    /**
     * The status of the verification.
     *  * `success` - A new verification window was created.
     *  * `retry` - A new attempt was created for an existing verification window.
     *  * `challenged` - The verification is suspicious and is restricted to non-SMS and non-voice channels only. This mode must be enabled for your customer account by Prelude support.
     *  * `blocked` - The verification was blocked.
     *  * `shadow_blocked` - The verification triggered a block rule but the decision was not enforced; this is used to dry-run anti-fraud configuration. This mode must be enabled for your customer account by Prelude support.
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
     * The ordered sequence of channels to be used for verification.
     *
     * @param list<Channel|value-of<Channel>> $channels
     */
    public function withChannels(array $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * The metadata for this verification.
     *
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The reason why the verification was blocked. Only present when status is "blocked" or "shadow_blocked".
     *  * `expired_signature` - The signature of the SDK signals is expired. They should be sent within
     *    the hour following their collection.
     *  * `in_block_list` - The phone number is part of the configured block list.
     *  * `invalid_phone_line` - The phone number is not a valid line number (e.g. landline).
     *  * `invalid_phone_number` - The phone number is not a valid phone number (e.g. unallocated range).
     *  * `invalid_signature` - The SDK signature did not verify, so the request cannot be attributed to the device it claims to come from.
     *  * `repeated_attempts` - The phone number exceeded the allowed number of verification attempts in a short period.
     *  * `suspicious` - The verification attempt was deemed suspicious by the anti-fraud system.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The risk factors that contributed to the verification being blocked. Only present when status is "blocked" or "shadow_blocked" and the anti-fraud system detected specific risk signals.
     *  * `automation_signature` - The request appears to come from an automated client rather than a person.
     *  * `carrier_not_permitted` - The destination carrier is one this account does not accept traffic for.
     *  * `client_fingerprint_mismatch` - The client does not appear to be the platform it identifies itself as.
     *  * `custom_policy` - A rule configured for your account matched this request.
     *  * `device_emulator` - The request appears to come from an emulator rather than a physical device.
     *  * `device_not_permitted` - The device platform is one your account blocks.
     *  * `device_reuse` - One device is driving verifications for an unusual number of phone numbers.
     *  * `expired_signals` - The SDK signals were collected too long before the request to still attest to it.
     *  * `fraud_database` - The phone number is flagged in one or more of the fraud databases Prelude consults.
     *  * `invalid_signature` - The SDK signature did not verify, so the request cannot be attributed to the device it claims to come from.
     *  * `ip_concentration` - The request shares its origin with an unusual volume of other verifications.
     *  * `ip_reputation` - The originating IP address is not trusted.
     *  * `location_mismatch` - The network location and the phone number's country are inconsistent.
     *  * `missing_signals` - The verification expected Prelude SDK signals and none arrived.
     *  * `number_range_abuse` - The phone number belongs to a range currently associated with abuse.
     *  * `poor_conversion_history` - Traffic resembling this request rarely completes a verification.
     *  * `proxy_network` - The request did not arrive over the subscriber's own access network.
     *  * `repeated_attempts` - The phone number exceeded the allowed number of verification attempts in a short period.
     *  * `temporary_phone_number` - The phone number belongs to a disposable or short-lived numbering service.
     *
     * @param list<RiskFactor|value-of<RiskFactor>> $riskFactors
     */
    public function withRiskFactors(array $riskFactors): self
    {
        $self = clone $this;
        $self['riskFactors'] = $riskFactors;

        return $self;
    }

    /**
     * The silent verification specific properties.
     *
     * @param Silent|SilentShape $silent
     */
    public function withSilent(Silent|array $silent): self
    {
        $self = clone $this;
        $self['silent'] = $silent;

        return $self;
    }
}
