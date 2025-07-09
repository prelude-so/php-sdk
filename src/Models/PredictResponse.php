<?php

declare(strict_types=1);

namespace Prelude\Models;

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

    /**
     * @param string $id
     * @param string $prediction
     * @param string $requestID
     */
    final public function __construct($id, $prediction, $requestID)
    {
        $this->constructFromArgs(func_get_args());
    }
}

PredictResponse::_loadMetadata();
