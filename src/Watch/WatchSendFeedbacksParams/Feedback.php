<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Metadata;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Target;
use Prelude\Watch\WatchSendFeedbacksParams\Feedback\Type;

/**
 * @phpstan-type feedback_alias = array{
 *   target: Target,
 *   type: Type::*,
 *   dispatchID?: string,
 *   metadata?: Metadata,
 *   signals?: Signals,
 * }
 */
final class Feedback implements BaseModel
{
    use Model;

    /**
     * The feedback target. Only supports phone numbers for now.
     */
    #[Api]
    public Target $target;

    /**
     * The type of feedback.
     *
     * @var Type::* $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    /**
     * The metadata for this feedback.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    #[Api(optional: true)]
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
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type::* $type
     */
    public static function with(
        Target $target,
        string $type,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Signals $signals = null,
    ): self {
        $obj = new self;

        $obj->target = $target;
        $obj->type = $type;

        null !== $dispatchID && $obj->dispatchID = $dispatchID;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $signals && $obj->signals = $signals;

        return $obj;
    }

    /**
     * The feedback target. Only supports phone numbers for now.
     */
    public function withTarget(Target $target): self
    {
        $obj = clone $this;
        $obj->target = $target;

        return $obj;
    }

    /**
     * The type of feedback.
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

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
     * The metadata for this feedback.
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
