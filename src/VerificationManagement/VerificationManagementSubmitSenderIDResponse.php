<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse\Status;

/**
 * @phpstan-type VerificationManagementSubmitSenderIDResponseShape = array{
 *   senderID: string, status: value-of<Status>, reason?: string|null
 * }
 */
final class VerificationManagementSubmitSenderIDResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementSubmitSenderIDResponseShape> */
    use SdkModel;

    /**
     * The sender ID that was added.
     */
    #[Required('sender_id')]
    public string $senderID;

    /**
     * It indicates the status of the sender ID. Possible values are:
     *   * `approved` - The sender ID is approved.
     *   * `pending` - The sender ID is pending.
     *   * `rejected` - The sender ID is rejected.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The reason why the sender ID was rejected.
     */
    #[Optional]
    public ?string $reason;

    /**
     * `new VerificationManagementSubmitSenderIDResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationManagementSubmitSenderIDResponse::with(senderID: ..., status: ...)
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
        string $senderID,
        Status|string $status,
        ?string $reason = null
    ): self {
        $obj = new self;

        $obj['senderID'] = $senderID;
        $obj['status'] = $status;

        null !== $reason && $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * The sender ID that was added.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj['senderID'] = $senderID;

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
        $obj['reason'] = $reason;

        return $obj;
    }
}
