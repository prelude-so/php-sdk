<?php

declare(strict_types=1);

namespace Prelude\Responses\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Responses\Watch\WatchSendFeedbacksResponse\Status;

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

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status::* $status
     */
    public static function from(string $requestID, string $status): self
    {
        $obj = new self;

        $obj->requestID = $requestID;
        $obj->status = $status;

        return $obj;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function setRequestID(string $requestID): self
    {
        $this->requestID = $requestID;

        return $this;
    }

    /**
     * The status of the feedbacks sending.
     *
     * @param Status::* $status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
