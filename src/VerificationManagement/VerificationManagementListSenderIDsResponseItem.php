<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponseItem\Status;

/**
 * @phpstan-type verification_management_list_sender_ids_response_item = array{
 *   status?: value-of<Status>, value?: string
 * }
 */
final class VerificationManagementListSenderIDsResponseItem implements BaseModel
{
    /** @use SdkModel<verification_management_list_sender_ids_response_item> */
    use SdkModel;

    /**
     * It indicates the status of the sender ID. Possible values are:
     *   * `approved` - The sender ID is approved.
     *   * `pending` - The sender ID is pending.
     *   * `rejected` - The sender ID is rejected.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Value that will be presented as Sender ID.
     */
    #[Api(optional: true)]
    public ?string $value;

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
        Status|string|null $status = null,
        ?string $value = null
    ): self {
        $obj = new self;

        null !== $status && $obj['status'] = $status;
        null !== $value && $obj->value = $value;

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
     * Value that will be presented as Sender ID.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
