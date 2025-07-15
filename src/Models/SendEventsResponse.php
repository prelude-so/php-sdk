<?php

declare(strict_types=1);

namespace Prelude\Models;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;

final class SendEventsResponse implements BaseModel
{
    use Model;

    #[Api('request_id')]
    public string $requestID;

    #[Api]
    public string $status;

    /**
     * You must use named parameters to construct this object.
     */
    final public function __construct(string $requestID, string $status)
    {
        $this->requestID = $requestID;
        $this->status = $status;
    }
}

SendEventsResponse::_loadMetadata();
