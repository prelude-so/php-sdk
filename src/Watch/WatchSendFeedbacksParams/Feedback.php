<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Metadata;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals\DevicePlatform;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Target;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Type;

/**
 * @phpstan-type FeedbackShape = array{
 *   target: Target,
 *   type: value-of<Type>,
 *   dispatch_id?: string|null,
 *   metadata?: Metadata|null,
 *   signals?: Signals|null,
 * }
 */
final class Feedback implements BaseModel
{
    /** @use SdkModel<FeedbackShape> */
    use SdkModel;

    /**
     * The feedback target. Only supports phone numbers for now.
     */
    #[Required]
    public Target $target;

    /**
     * The type of feedback.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Optional]
    public ?string $dispatch_id;

    /**
     * The metadata for this feedback.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Optional]
    public ?Signals $signals;

    /**
     * `new Feedback()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Feedback::with(target: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Feedback)->withTarget(...)->withType(...)
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
     * @param Target|array{
     *   type: value-of<Target\Type>,
     *   value: string,
     * } $target
     * @param Type|value-of<Type> $type
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
        Type|string $type,
        ?string $dispatch_id = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
    ): self {
        $obj = new self;

        $obj['target'] = $target;
        $obj['type'] = $type;

        null !== $dispatch_id && $obj['dispatch_id'] = $dispatch_id;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $signals && $obj['signals'] = $signals;

        return $obj;
    }

    /**
     * The feedback target. Only supports phone numbers for now.
     *
     * @param Target|array{
     *   type: value-of<Target\Type>,
     *   value: string,
     * } $target
     */
    public function withTarget(Target|array $target): self
    {
        $obj = clone $this;
        $obj['target'] = $target;

        return $obj;
    }

    /**
     * The type of feedback.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
     * The metadata for this feedback.
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
