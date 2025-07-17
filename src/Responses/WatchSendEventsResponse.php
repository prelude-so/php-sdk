<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\WatchSendEventsResponse\Status;

final class WatchSendEventsResponse implements BaseModel
{
    use Model;

    #[Api('request_id')]
    public string $requestID;

    /** @var Status::* $status */
    #[Api]
    public string $status;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Status::* $status
     */
    final public function __construct(string $requestID, string $status)
    {
        $this->requestID = $requestID;
        $this->status = $status;

        self::_introspect();
    }
}
