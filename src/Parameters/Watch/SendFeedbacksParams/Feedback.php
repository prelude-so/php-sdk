<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\SendFeedbacksParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback\Metadata;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback\Signals;
use Prelude\Parameters\Watch\SendFeedbacksParams\Feedback\Target;

final class Feedback implements BaseModel
{
    use Model;

    #[Api]
    public Target $target;

    #[Api]
    public string $type;

    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api(optional: true)]
    public ?Signals $signals;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(
        Target $target,
        string $type,
        ?string $dispatchID = null,
        ?Metadata $metadata = null,
        ?Signals $signals = null,
    ) {
        $this->target = $target;
        $this->type = $type;
        $this->dispatchID = $dispatchID;
        $this->metadata = $metadata;
        $this->signals = $signals;
    }
}

Feedback::_loadMetadata();
