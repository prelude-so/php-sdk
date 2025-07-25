<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Metadata;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Signals;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Target;
use Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Type;

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
    public static function new(
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
    public function setTarget(Target $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * The type of feedback.
     *
     * @param Type::* $type
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * The identifier of the dispatch that came from the front-end SDK.
     */
    public function setDispatchID(string $dispatchID): self
    {
        $this->dispatchID = $dispatchID;

        return $this;
    }

    /**
     * The metadata for this feedback.
     */
    public function setMetadata(Metadata $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * The signals used for anti-fraud. For more details, refer to [Signals](/verify/v2/documentation/prevent-fraud#signals).
     */
    public function setSignals(Signals $signals): self
    {
        $this->signals = $signals;

        return $this;
    }
}
