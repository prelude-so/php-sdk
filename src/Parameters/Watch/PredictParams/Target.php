<?php

declare(strict_types=1);

namespace Prelude\Parameters\Watch\PredictParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class Target implements BaseModel
{
    use Model;

    #[Api]
    public string $type;

    #[Api]
    public string $value;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}

Target::_loadMetadata();
