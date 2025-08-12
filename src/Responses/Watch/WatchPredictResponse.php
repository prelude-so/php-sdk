<?php

declare(strict_types=1);

namespace Prelude\Responses\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\Watch\WatchPredictResponse\Prediction;

/**
 * @phpstan-type watch_predict_response_alias = array{
 *   id: string, prediction: Prediction::*, requestID: string
 * }
 */
final class WatchPredictResponse implements BaseModel
{
    use Model;

    /**
     * The prediction identifier.
     */
    #[Api]
    public string $id;

    /**
     * The prediction outcome.
     *
     * @var Prediction::* $prediction
     */
    #[Api(enum: Prediction::class)]
    public string $prediction;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Api('request_id')]
    public string $requestID;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Prediction::* $prediction
     */
    public static function from(
        string $id,
        string $prediction,
        string $requestID
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->prediction = $prediction;
        $obj->requestID = $requestID;

        return $obj;
    }

    /**
     * The prediction identifier.
     */
    public function setID(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The prediction outcome.
     *
     * @param Prediction::* $prediction
     */
    public function setPrediction(string $prediction): self
    {
        $this->prediction = $prediction;

        return $this;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function setRequestID(string $requestID): self
    {
        $this->requestID = $requestID;

        return $this;
    }
}
