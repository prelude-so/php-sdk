<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\WatchPredictResponse\Prediction;

/**
 * @phpstan-type watch_predict_response_alias = array{
 *   id: string, prediction: Prediction::*, requestID: string
 * }
 */
final class WatchPredictResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    /** @var Prediction::* $prediction */
    #[Api]
    public string $prediction;

    #[Api('request_id')]
    public string $requestID;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Prediction::* $prediction
     */
    final public function __construct(
        string $id,
        string $prediction,
        string $requestID
    ) {
        self::introspect();

        $this->id = $id;
        $this->prediction = $prediction;
        $this->requestID = $requestID;
    }
}
