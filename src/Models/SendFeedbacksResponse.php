<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

class SendFeedbacksResponse implements BaseModel
{
    use Model;

    #[Api('request_id')]
    public string $requestID;

    #[Api]
    public string $status;

    /**
     * You must use named parameters to construct this object. If an named argument is not
     * given, it will not be included during JSON serialization. The arguments are untyped
     * so you can pass any JSON serializable value, but the API expects the types to match
     * the PHPDoc types.
     *
     * @param string $requestID `required`
     * @param string $status    `required`
     */
    final public function __construct($requestID, $status)
    {
        $this->constructFromArgs(func_get_args());
    }
}

SendFeedbacksResponse::_loadMetadata();
