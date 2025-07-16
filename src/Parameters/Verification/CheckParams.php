<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\Verification\CheckParams\Target;

final class CheckParams implements BaseModel
{
    use Model;
    use Params;

    #[Api]
    public string $code;

    #[Api]
    public Target $target;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $code, Target $target)
    {
        $this->code = $code;
        $this->target = $target;
    }
}

CheckParams::__introspect();
