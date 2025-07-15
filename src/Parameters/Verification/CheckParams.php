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
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $code   `required`
     * @param Target $target `required`
     */
    final public function __construct($code, $target)
    {
        $this->constructFromArgs(func_get_args());
    }
}

CheckParams::_loadMetadata();
