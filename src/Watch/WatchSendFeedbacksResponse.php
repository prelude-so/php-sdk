<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\Watch\WatchSendFeedbacksResponse\Status;

/**
 * @phpstan-type WatchSendFeedbacksResponseShape = array{
 *   request_id: string, status: value-of<Status>
 * }
 */
final class WatchSendFeedbacksResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WatchSendFeedbacksResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Api]
    public string $request_id;

    /**
     * The status of the feedbacks sending.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * `new WatchSendFeedbacksResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchSendFeedbacksResponse::with(request_id: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WatchSendFeedbacksResponse)->withRequestID(...)->withStatus(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(string $request_id, Status|string $status): self
    {
        $obj = new self;

        $obj['request_id'] = $request_id;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $obj = clone $this;
        $obj['request_id'] = $requestID;

        return $obj;
    }

    /**
     * The status of the feedbacks sending.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
