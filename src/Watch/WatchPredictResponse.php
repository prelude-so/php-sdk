<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictResponse\Prediction;
use Prelude\Watch\WatchPredictResponse\RiskFactor;

/**
 * @phpstan-type WatchPredictResponseShape = array{
 *   id: string,
 *   prediction: Prediction|value-of<Prediction>,
 *   requestID: string,
 *   riskFactors?: list<RiskFactor|value-of<RiskFactor>>|null,
 * }
 */
final class WatchPredictResponse implements BaseModel
{
    /** @use SdkModel<WatchPredictResponseShape> */
    use SdkModel;

    /**
     * The prediction identifier.
     */
    #[Required]
    public string $id;

    /**
     * The prediction outcome.
     *
     * @var value-of<Prediction> $prediction
     */
    #[Required(enum: Prediction::class)]
    public string $prediction;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Required('request_id')]
    public string $requestID;

    /**
     * The risk factors that contributed to the suspicious prediction. Only present when prediction is "suspicious" and the anti-fraud system detected specific risk signals.
     *  * `account_risk_profile` - The request matches a risk profile derived from the outcomes reported on your own account.
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
     * `new WatchPredictResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchPredictResponse::with(id: ..., prediction: ..., requestID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchPredictResponse)->withID(...)->withPrediction(...)->withRequestID(...)
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
     * @param Prediction|value-of<Prediction> $prediction
     * @param list<RiskFactor|value-of<RiskFactor>>|null $riskFactors
     */
    public static function with(
        string $id,
        Prediction|string $prediction,
        string $requestID,
        ?array $riskFactors = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['prediction'] = $prediction;
        $self['requestID'] = $requestID;

        null !== $riskFactors && $self['riskFactors'] = $riskFactors;

        return $self;
    }

    /**
     * The prediction identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The prediction outcome.
     *
     * @param Prediction|value-of<Prediction> $prediction
     */
    public function withPrediction(Prediction|string $prediction): self
    {
        $self = clone $this;
        $self['prediction'] = $prediction;

        return $self;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The risk factors that contributed to the suspicious prediction. Only present when prediction is "suspicious" and the anti-fraud system detected specific risk signals.
     *  * `account_risk_profile` - The request matches a risk profile derived from the outcomes reported on your own account.
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
}
