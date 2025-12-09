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
 *   dispatchID?: string,
 *   metadata?: Metadata|array{correlationID?: string|null},
 *   signals?: Signals|array{
 *     appVersion?: string|null,
 *     deviceID?: string|null,
 *     deviceModel?: string|null,
 *     devicePlatform?: value-of<DevicePlatform>|null,
 *     ip?: string|null,
 *     isTrustedUser?: bool|null,
 *     ja4Fingerprint?: string|null,
 *     osVersion?: string|null,
 *     userAgent?: string|null,
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
     * @param Target|array{type: value-of<Type>, value: string} $target
     * @param Metadata|array{correlationID?: string|null} $metadata
     * @param Signals|array{
     *   appVersion?: string|null,
     *   deviceID?: string|null,
     *   deviceModel?: string|null,
     *   devicePlatform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   isTrustedUser?: bool|null,
     *   ja4Fingerprint?: string|null,
     *   osVersion?: string|null,
     *   userAgent?: string|null,
     * } $signals
     */
    public static function with(
        Target|array $target,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
    ): self {
        $obj = new self;

        $obj['target'] = $target;

        null !== $dispatchID && $obj['dispatchID'] = $dispatchID;
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
        $obj['dispatchID'] = $dispatchID;

        return $obj;
    }

    /**
     * The metadata for this prediction.
     *
     * @param Metadata|array{correlationID?: string|null} $metadata
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
     *   appVersion?: string|null,
     *   deviceID?: string|null,
     *   deviceModel?: string|null,
     *   devicePlatform?: value-of<DevicePlatform>|null,
     *   ip?: string|null,
     *   isTrustedUser?: bool|null,
     *   ja4Fingerprint?: string|null,
     *   osVersion?: string|null,
     *   userAgent?: string|null,
     * } $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $obj = clone $this;
        $obj['signals'] = $signals;

        return $obj;
    }
}
