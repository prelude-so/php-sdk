<?php

declare(strict_types=1);

namespace Prelude\Parameters;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Parameters\VerificationCheckParam\Target;

final class VerificationCheckParam implements BaseModel
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

        self::_introspect();
    }
}
