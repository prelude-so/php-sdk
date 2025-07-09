<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\PredictParams;

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
     * @param string $type
     * @param string $value
     */
    final public function __construct($type, $value)
    {
        $this->constructFromArgs(func_get_args());
    }
}

Target::_loadMetadata();
