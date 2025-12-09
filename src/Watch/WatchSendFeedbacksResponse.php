<?php

declare(strict_types=1);

namespace Prelude\Watch;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Watch\WatchSendFeedbacksResponse\Status;

/**
 * @phpstan-type WatchSendFeedbacksResponseShape = array{
 *   requestID: string, status: value-of<Status>
 * }
 */
final class WatchSendFeedbacksResponse implements BaseModel
{
    /** @use SdkModel<WatchSendFeedbacksResponseShape> */
    use SdkModel;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Required('request_id')]
    public string $requestID;

    /**
     * The status of the feedbacks sending.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new WatchSendFeedbacksResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WatchSendFeedbacksResponse::with(requestID: ..., status: ...)
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
    public static function with(string $requestID, Status|string $status): self
    {
        $self = new self;

        $self['requestID'] = $requestID;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * The status of the feedbacks sending.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
