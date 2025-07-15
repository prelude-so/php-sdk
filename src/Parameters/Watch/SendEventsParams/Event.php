<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\SendEventsParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Watch\SendEventsParams\Event\Target;

final class Event implements BaseModel
{
    use Model;

    #[Api]
    public string $confidence;

    #[Api]
    public string $label;

    #[Api]
    public Target $target;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(
        string $confidence,
        string $label,
        Target $target
    ) {
        $this->confidence = $confidence;
        $this->label = $label;
        $this->target = $target;
    }
}

Event::_loadMetadata();
