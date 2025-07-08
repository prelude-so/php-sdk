<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification\CheckParams;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class Target implements BaseModel
{
    use Model;

    #[Api]
    public string $type;

    #[Api]
    public string $value;

    final public function __construct(string $type, string $value)
    {
        $args = func_get_args();

        $data = [];
        for ($i = 0; $i < count($args); ++$i) {
            if (None::NOT_SET !== $args[$i]) {
                $data[self::$_constructorArgNames[$i]] = $args[$i] ?? null;
            }
        }

        $this->__unserialize($data);
    }
}

Target::_loadMetadata();
