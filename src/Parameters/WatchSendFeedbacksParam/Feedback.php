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

    /**
     * You must use named parameters to construct this object.
     *
     * @param Type::* $type
     */
    final public function __construct(
        Target $target,
        string $type,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Signals $signals = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        $this->target = $target;
        $this->type = $type;

        null !== $dispatchID && $this->dispatchID = $dispatchID;
        null !== $metadata && $this->metadata = $metadata;
        null !== $signals && $this->signals = $signals;
    }
}
