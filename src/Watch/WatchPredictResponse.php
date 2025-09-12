<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictResponse\Prediction;

/**
 * @phpstan-type watch_predict_response = array{
 *   id: string, prediction: value-of<Prediction>, requestID: string
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class WatchPredictResponse implements BaseModel
{
    /** @use SdkModel<watch_predict_response> */
    use SdkModel;

    /**
     * The prediction identifier.
     */
    #[Api]
    public string $id;

    /**
     * The prediction outcome.
     *
     * @var value-of<Prediction> $prediction
     */
    #[Api(enum: Prediction::class)]
    public string $prediction;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Api('request_id')]
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
        $obj = new self;

        $obj->id = $id;
        $obj->prediction = $prediction instanceof Prediction ? $prediction->value : $prediction;
        $obj->requestID = $requestID;

        return $obj;
    }

    /**
     * The prediction identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The prediction outcome.
     *
     * @param Prediction|value-of<Prediction> $prediction
     */
    public function withPrediction(Prediction|string $prediction): self
    {
        $obj = clone $this;
        $obj->prediction = $prediction instanceof Prediction ? $prediction->value : $prediction;

        return $obj;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj->requestID = $requestID;

        return $obj;
    }
}
