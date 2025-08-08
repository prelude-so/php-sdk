<?php

declare(strict_types=1);

namespace Prelude\Models\WatchSendEventsParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Models\WatchSendEventsParams\Event\Confidence;
use Prelude\Models\WatchSendEventsParams\Event\Target;

/**
 * @phpstan-type event_alias = array{
 *   confidence: Confidence::*, label: string, target: Target
 * }
 */
final class Event implements BaseModel
{
    use Model;

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
     * @param Confidence::* $confidence
     */
    public static function new(
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
    public function setConfidence(string $confidence): self
    {
        $this->confidence = $confidence;

        return $this;
    }

    /**
     * A label to describe what the event refers to.
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * The event target. Only supports phone numbers for now.
     */
    public function setTarget(Target $target): self
    {
        $this->target = $target;

        return $this;
    }
}
