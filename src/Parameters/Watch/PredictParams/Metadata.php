<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\PredictParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class Metadata implements BaseModel
{
    use Model;

    #[Api('correlation_id', optional: true)]
    public ?string $correlationID;

    /** @param null|string $correlationID */
    final public function __construct($correlationID = None::NOT_GIVEN)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Metadata::_loadMetadata();
