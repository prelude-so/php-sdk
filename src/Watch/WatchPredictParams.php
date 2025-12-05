<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchPredictParams\Metadata;
use Prelude\Watch\WatchPredictParams\Signals;
use Prelude\Watch\WatchPredictParams\Signals\DevicePlatform;
use Prelude\Watch\WatchPredictParams\Target;
use Prelude\Watch\WatchPredictParams\Target\Type;

/**
 * Predict the outcome of a verification based on Prelude’s anti-fraud system.
 *
 * @see Prelude\Services\WatchService::predict()
 *
 * @phpstan-type WatchPredictParamsShape = array{
 *   target: Target|array{type: value-of<Type>, value: string},
 *   dispatch_id?: string,
 *   metadata?: Metadata|array{correlation_id?: string|null},
 *   signals?: Signals|array{
 *     app_version?: string|null,
 *     device_id?: string|null,
 *     device_model?: string|null,
 *     device_platform?: value-of<DevicePlatform>|null,
 *     ip?: string|null,
 *     is_trusted_user?: bool|null,
 *     ja4_fingerprint?: string|null,
 *     os_version?: string|null,
 *     user_agent?: string|null,
 *   },
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
    #[Api]
    public Target $target;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Api(optional: true)]
    public ?string $dispatch_id;

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
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Target|array{type: value-of<Type>, value: string} $target
     * @param Metadata|array{correlation_id?: string|null} $metadata
     * @param Signals|array{
     *   app_version?: string|null,
     *   device_id?: string|null,
     *   device_model?: string|null,
     *   device_platform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   is_trusted_user?: bool|null,
     *   ja4_fingerprint?: string|null,
     *   os_version?: string|null,
     *   user_agent?: string|null,
     * } $signals
     */
    public static function with(
        Target|array $target,
        ?string $dispatch_id = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
    ): self {
        $obj = new self;

        $obj['target'] = $target;

        null !== $dispatch_id && $obj['dispatch_id'] = $dispatch_id;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $signals && $obj['signals'] = $signals;

        return $obj;
    }

    /**
     * The prediction target. Only supports phone numbers for now.
     *
     * @param Target|array{type: value-of<Type>, value: string} $target
     */
    public function withTarget(Target|array $target): self
    {
        $obj = clone $this;
        $obj['target'] = $target;

        return $obj;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function withDispatchID(string $dispatchID): self
    {
        $obj = clone $this;
        $obj['dispatch_id'] = $dispatchID;

        return $obj;
    }

    /**
     * The metadata for this prediction.
     *
     * @param Metadata|array{correlation_id?: string|null} $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     *
     * @param Signals|array{
     *   app_version?: string|null,
     *   device_id?: string|null,
     *   device_model?: string|null,
     *   device_platform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   is_trusted_user?: bool|null,
     *   ja4_fingerprint?: string|null,
     *   os_version?: string|null,
     *   user_agent?: string|null,
     * } $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $obj = clone $this;
        $obj['signals'] = $signals;

        return $obj;
    }
}
