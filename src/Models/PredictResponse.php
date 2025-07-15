<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class PredictResponse implements BaseModel
{
    use Model;

    #[Api]
    public string $id;

    #[Api]
    public string $prediction;

    #[Api('request_id')]
    public string $requestID;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $id         `required`
     * @param string $prediction `required`
     * @param string $requestID  `required`
     */
    final public function __construct($id, $prediction, $requestID)
    {
        $this->constructFromArgs(func_get_args());
    }
}

PredictResponse::_loadMetadata();
