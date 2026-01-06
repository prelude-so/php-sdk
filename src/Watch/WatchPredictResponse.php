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
     *  * `behavioral_pattern` - The phone number past behavior during verification flows exhibits suspicious patterns.
     *  * `device_attribute` - The device exhibits characteristics associated with suspicious activity patterns.
     *  * `fraud_database` - The phone number has been flagged as suspicious in one or more of our fraud databases.
     *  * `location_discrepancy` - The phone number prefix and IP address discrepancy indicates potential fraud.
     *  * `network_fingerprint` - The network connection exhibits characteristics associated with suspicious activity patterns.
     *  * `poor_conversion_history` - The phone number has a history of poorly converting to a verified phone number.
     *  * `prefix_concentration` - The phone number is part of a range known to be associated with suspicious activity patterns.
     *  * `suspected_request_tampering` - The SDK signature is invalid and the request is considered to be tampered with.
     *  * `suspicious_ip_address` - The IP address is deemed to be associated with suspicious activity patterns.
     *  * `temporary_phone_number` - The phone number is known to be a temporary or disposable number.
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
     *  * `behavioral_pattern` - The phone number past behavior during verification flows exhibits suspicious patterns.
     *  * `device_attribute` - The device exhibits characteristics associated with suspicious activity patterns.
     *  * `fraud_database` - The phone number has been flagged as suspicious in one or more of our fraud databases.
     *  * `location_discrepancy` - The phone number prefix and IP address discrepancy indicates potential fraud.
     *  * `network_fingerprint` - The network connection exhibits characteristics associated with suspicious activity patterns.
     *  * `poor_conversion_history` - The phone number has a history of poorly converting to a verified phone number.
     *  * `prefix_concentration` - The phone number is part of a range known to be associated with suspicious activity patterns.
     *  * `suspected_request_tampering` - The SDK signature is invalid and the request is considered to be tampered with.
     *  * `suspicious_ip_address` - The IP address is deemed to be associated with suspicious activity patterns.
     *  * `temporary_phone_number` - The phone number is known to be a temporary or disposable number.
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
