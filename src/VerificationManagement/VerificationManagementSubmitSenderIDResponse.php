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
 *   senderID: string, status: Status|value-of<Status>, reason?: string|null
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
        $self = new self;

        $self['senderID'] = $senderID;
        $self['status'] = $status;

        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * The sender ID that was added.
     */
    public function withSenderID(string $senderID): self
    {
        $self = clone $this;
        $self['senderID'] = $senderID;

        return $self;
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
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The reason why the sender ID was rejected.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
