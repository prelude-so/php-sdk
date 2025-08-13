<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;

/**
 * Predict the outcome of a verification based on Prelude’s anti-fraud system.
 *
 * @phpstan-type predict_params = array{
 *   target: Target, dispatchID?: string, metadata?: Metadata, signals?: Signals
 * }
 */
final class WatchPredictParams implements BaseModel
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
     * `new WatchPredictParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchPredictParams::with(target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchPredictParams)->withTarget(...)
     * ```
     */
    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        Target $target,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Signals $signals = null,
    ): self {
        $obj = new self;

        $obj->target = $target;

        null !== $dispatchID && $obj->dispatchID = $dispatchID;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $signals && $obj->signals = $signals;

        return $obj;
    }

    /**
     * The prediction target. Only supports phone numbers for now.
     */
    public function withTarget(Target $target): self
    {
        $obj = clone $this;
        $obj->target = $target;

        return $obj;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $obj = clone $this;
        $obj->dispatchID = $dispatchID;

        return $obj;
    }

    /**
     * The metadata for this prediction.
     */
    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function withSignals(Signals $signals): self
    {
        $obj = clone $this;
        $obj->signals = $signals;

        return $obj;
    }
}
