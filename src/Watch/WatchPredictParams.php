<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Target;

/**
 * Predict the outcome of a verification based on Prelude’s anti-fraud system.
 *
 * @see Prelude\Services\WatchService::predict()
 *
 * @phpstan-import-type TargetShape from \Prelude\Watch\WatchPredictParams\Target
 * @phpstan-import-type MetadataShape from \Prelude\Watch\WatchPredictParams\Metadata
 * @phpstan-import-type SignalsShape from \Prelude\Watch\WatchPredictParams\Signals
 *
 * @phpstan-type WatchPredictParamsShape = array{
 *   target: TargetShape,
 *   dispatchID?: string|null,
 *   metadata?: MetadataShape|null,
 *   signals?: SignalsShape|null,
 * }
 */
final class WatchPredictParams implements BaseModel
{
    /** @use SdkModel<WatchPredictParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The prediction target. Only supports phone numbers for now.
     */
    #[Required]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Optional('dispatch_id')]
    public ?string $dispatchID;

    /**
     * The metadata for this prediction.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional]
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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TargetShape $target
     * @param MetadataShape $metadata
     * @param SignalsShape $signals
     */
    public static function with(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['target'] = $target;

        null !== $dispatchID && $self['dispatchID'] = $dispatchID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $signals && $self['signals'] = $signals;

        return $self;
    }

    /**
     * The prediction target. Only supports phone numbers for now.
     *
     * @param TargetShape $target
     */
    public function withTarget(Target|array $target): self
    {
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $self = clone $this;
        $self['dispatchID'] = $dispatchID;

        return $self;
    }

    /**
     * The metadata for this prediction.
     *
     * @param MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @param SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
