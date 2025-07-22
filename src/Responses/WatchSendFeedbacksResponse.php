<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\WatchSendFeedbacksResponse\Status;

/**
 * @phpstan-type watch_send_feedbacks_response_alias = array{
 *   requestID: string, status: Status::*
 * }
 */
final class WatchSendFeedbacksResponse implements BaseModel
{
    use Model;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Api('request_id')]
    public string $requestID;

    /**
     * The status of the feedbacks sending.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * You must use named parameters to construct this object.
     *
     * @param Status::* $status
     */
    final public function __construct(string $requestID, string $status)
    {
        self::introspect();

        $this->requestID = $requestID;
        $this->status = $status;
    }
}
