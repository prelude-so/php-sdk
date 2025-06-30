<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\None;
use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

class CheckResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $status;

    #[Api(optional: true)]
    public string $id;

    /**
     * @var array{correlationID?: string} $metadata
     */
    #[Api(optional: true)]
    public array $metadata;

    #[Api('request_id', optional: true)]
    public string $requestID;

    /**
     * @param string                        $id
     * @param array{correlationID?: string} $metadata
     * @param string                        $requestID
     */
    final public function __construct(
        string $status,
        string|None $id = None::NOT_SET,
        array|None $metadata = None::NOT_SET,
        string|None $requestID = None::NOT_SET,
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

CheckResponse::_loadMetadata();
