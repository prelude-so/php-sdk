<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse\Status;

/**
 * @phpstan-type VerificationManagementSubmitSenderIDResponseShape = array{
 *   sender_id: string, status: value-of<Status>, reason?: string|null
 * }
 */
final class VerificationManagementSubmitSenderIDResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VerificationManagementSubmitSenderIDResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The sender ID that was added.
     */
    #[Api]
    public string $sender_id;

    /**
     * It indicates the status of the sender ID. Possible values are:
     *   * `approved` - The sender ID is approved.
     *   * `pending` - The sender ID is pending.
     *   * `rejected` - The sender ID is rejected.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The reason why the sender ID was rejected.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * `new VerificationManagementSubmitSenderIDResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSubmitSenderIDResponse::with(sender_id: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationManagementSubmitSenderIDResponse)
     *   ->withSenderID(...)
     *   ->withStatus(...)
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
    public static function with(
        string $sender_id,
        Status|string $status,
        ?string $reason = null
    ): self {
        $obj = new self;

        $obj->sender_id = $sender_id;
        $obj['status'] = $status;

        null !== $reason && $obj->reason = $reason;

        return $obj;
    }

    /**
     * The sender ID that was added.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj->sender_id = $senderID;

        return $obj;
    }

    /**
     * It indicates the status of the sender ID. Possible values are:
     *   * `approved` - The sender ID is approved.
     *   * `pending` - The sender ID is pending.
     *   * `rejected` - The sender ID is rejected.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The reason why the sender ID was rejected.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }
}
