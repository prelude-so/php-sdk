<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictResponse\Prediction;

/**
 * @phpstan-type WatchPredictResponseShape = array{
 *   id: string, prediction: Prediction|value-of<Prediction>, requestID: string
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
     */
    public static function with(
        string $id,
        Prediction|string $prediction,
        string $requestID
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['prediction'] = $prediction;
        $self['requestID'] = $requestID;

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
}
