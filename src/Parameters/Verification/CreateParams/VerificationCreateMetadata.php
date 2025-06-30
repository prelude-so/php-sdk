<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\None;
use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

class VerificationCreateMetadata implements BaseModel
{
    use Model;

    #[Api('correlation_id', optional: true)]
    public string $correlationID;

    /**
     * @param string $correlationID
     */
    final public function __construct(
        string|None $correlationID = None::NOT_SET,
    ) {

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

VerificationCreateMetadata::_loadMetadata();
