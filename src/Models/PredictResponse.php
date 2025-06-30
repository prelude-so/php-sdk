<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\None;
use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

class PredictResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api]
    public string $prediction;

    #[Api('request_id')]
    public string $requestID;

    final public function __construct(
        string $id,
        string $prediction,
        string $requestID,
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

PredictResponse::_loadMetadata();
