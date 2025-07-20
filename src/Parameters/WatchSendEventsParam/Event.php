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

    /** @var Confidence::* $confidence */
    #[Api]
    public string $confidence;

    #[Api]
    public string $label;

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
