<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Watch\PredictParams\Metadata;
use Prelude\Parameters\Watch\PredictParams\Signals;
use Prelude\Parameters\Watch\PredictParams\Target;

class PredictParams implements BaseModel
{
    use Model;
    use Params;

    #[Api]
    public Target $target;

    #[Api('dispatch_id', optional: true)]
    public ?string $dispatchID;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    #[Api(optional: true)]
    public ?Signals $signals;
}

PredictParams::_loadMetadata();
