<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Verification\CheckParams\Target;

class CheckParams implements BaseModel
{
    use Model;
    use Params;

    #[Api]
    public string $code;

    #[Api]
    public Target $target;
}

CheckParams::_loadMetadata();
