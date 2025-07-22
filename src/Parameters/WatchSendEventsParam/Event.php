<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendEventsParam;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\WatchSendEventsParam\Event\Confidence;
use Prelude\Parameters\WatchSendEventsParam\Event\Target;

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

    /**
     * You must use named parameters to construct this object.
     *
     * @param Confidence::* $confidence
     */
    final public function __construct(
        string $confidence,
        string $label,
        Target $target
    ) {
        self::introspect();

        $this->confidence = $confidence;
        $this->label = $label;
        $this->target = $target;
    }
}
