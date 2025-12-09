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
 *   dispatchID?: string|null,
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
    #[Optional('dispatch_id')]
    public ?string $dispatchID;

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
        Type|string $type,
        ?string $dispatchID = null,
        Metadata|array|null $metadata = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['target'] = $target;
        $self['type'] = $type;

        null !== $dispatchID && $self['dispatchID'] = $dispatchID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $signals && $self['signals'] = $signals;

        return $self;
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
        $self = clone $this;
        $self['target'] = $target;

        return $self;
    }

    /**
     * The type of feedback.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
     * The metadata for this feedback.
     *
     * @param Metadata|array{correlationID?: string|null} $metadata
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
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
