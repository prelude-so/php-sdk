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
     * @param string $requestID
     * @param string $status
     */
    final public function __construct($requestID, $status)
    {
        $this->constructFromArgs(func_get_args());
    }
}

SendFeedbacksResponse::_loadMetadata();
