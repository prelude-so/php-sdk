<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\Watch\WatchPredictResponse\Prediction;

/**
 * @phpstan-type WatchPredictResponseShape = array{
 *   id: string, prediction: value-of<Prediction>, request_id: string
 * }
 */
final class WatchPredictResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WatchPredictResponseShape> */
    use SdkModel;

    use SdkResponse;

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
    #[Api]
    public string $request_id;

    /**
     * `new WatchPredictResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchPredictResponse::with(id: ..., prediction: ..., request_id: ...)
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
        string $request_id
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['prediction'] = $prediction;
        $obj['request_id'] = $request_id;

        return $obj;
    }

    /**
     * The prediction identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
        $obj['prediction'] = $prediction;

        return $obj;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['request_id'] = $requestID;

        return $obj;
    }
}
