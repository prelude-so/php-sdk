<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchPredictParam\Metadata;
use Prelude\Parameters\WatchPredictParam\Signals;
use Prelude\Parameters\WatchPredictParam\Target;

/**
 * Predict the outcome of a verification based on Prelude’s anti-fraud system.
 *
 * @phpstan-type predict_params = array{
 *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
 * }
 */
final class WatchPredictParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * The prediction target. Only supports phone numbers for now.
     */
    #[Api]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    /**
     * The metadata for this prediction.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Api(optional: true)]
    public ?Signals $signals;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(
        Target $target,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Signals $signals = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        $this->target = $target;

        null !== $dispatchID && $this->dispatchID = $dispatchID;
        null !== $metadata && $this->metadata = $metadata;
        null !== $signals && $this->signals = $signals;
    }
}
