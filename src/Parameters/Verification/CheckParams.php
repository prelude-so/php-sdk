<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Concerns\Params;
use Prelude\Core\Contracts\BaseModel;

class CheckParams implements BaseModel
{
    use Model;
    use Params;

    #[Api]
    public string $code;

    /**
     * @var array{type?: string, value?: string} $target
     */
    #[Api]
    public array $target;
}

CheckParams::_loadMetadata();
