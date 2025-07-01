<?php

declare(strict_types=1);

namespace Prelude\Parameters\Verification;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\None;

class VerificationCreateMetadata implements BaseModel
{
    use Model;

    #[Api('correlation_id', optional: true)]
    public string $correlationID;

    /**
     * @param string $correlationID
     */
    final public function __construct(
        None|string $correlationID = None::NOT_SET
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
