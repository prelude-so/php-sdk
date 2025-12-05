<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID\Status;

/**
 * @phpstan-type SenderIDShape = array{
 *   sender_id?: string|null, status?: value-of<Status>|null
 * }
 */
final class SenderID implements BaseModel
{
    /** @use SdkModel<SenderIDShape> */
    use SdkModel;

    /**
     * Value that will be presented as Sender ID.
     */
    #[Api(optional: true)]
    public ?string $sender_id;

    /**
     * It indicates the status of the Sender ID. Possible values are:
     *   * `approved` - The Sender ID is approved.
     *   * `pending` - The Sender ID is pending.
     *   * `rejected` - The Sender ID is rejected.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

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
        ?string $sender_id = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $sender_id && $obj['sender_id'] = $sender_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Value that will be presented as Sender ID.
     */
    public function withSenderID(string $senderID): self
    {
        $obj = clone $this;
        $obj['sender_id'] = $senderID;

        return $obj;
    }

    /**
     * It indicates the status of the Sender ID. Possible values are:
     *   * `approved` - The Sender ID is approved.
     *   * `pending` - The Sender ID is pending.
     *   * `rejected` - The Sender ID is rejected.
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
