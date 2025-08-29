<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendEventsParams\Event\Confidence;
use Prelude\Watch\WatchSendEventsParams\Event\Target;

/**
 * @phpstan-type event_alias = array{
 *   confidence: Confidence::*, label: string, target: Target
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<event_alias> */
    use SdkModel;

    /**
     * A confidence level you want to assign to the event.
     *
     * @var Confidence::* $confidence
     */
    #[Api(enum: Confidence::class)]
    public string $confidence;

    /**
     * A label to describe what the event refers to.
     */
    #[Api]
    public string $label;

    /**
     * The event target. Only supports phone numbers for now.
     */
    #[Api]
    public Target $target;

    /**
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(confidence: ..., label: ..., target: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)->withConfidence(...)->withLabel(...)->withTarget(...)
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
     * @param Confidence::* $confidence
     */
    public static function with(
        string $confidence,
        string $label,
        Target $target
    ): self {
        $obj = new self;

        $obj->confidence = $confidence;
        $obj->label = $label;
        $obj->target = $target;

        return $obj;
    }

    /**
     * A confidence level you want to assign to the event.
     *
     * @param Confidence::* $confidence
     */
    public function withConfidence(string $confidence): self
    {
        $obj = clone $this;
        $obj->confidence = $confidence;

        return $obj;
    }

    /**
     * A label to describe what the event refers to.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The event target. Only supports phone numbers for now.
     */
    public function withTarget(Target $target): self
    {
        $obj = clone $this;
        $obj->target = $target;

        return $obj;
    }
}
