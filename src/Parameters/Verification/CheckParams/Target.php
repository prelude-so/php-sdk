<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CheckParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

class Target implements BaseModel
{
    use Model;

    #[Api]
    public string $type;

    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $type  `required`
     * @param string $value `required`
     */
    final public function __construct($type, $value)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Target::_loadMetadata();
