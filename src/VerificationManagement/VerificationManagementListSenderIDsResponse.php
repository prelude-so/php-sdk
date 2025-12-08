<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID\Status;

/**
 * A list of Sender ID.
 *
 * @phpstan-type VerificationManagementListSenderIDsResponseShape = array{
 *   sender_ids?: list<SenderID>|null
 * }
 */
final class VerificationManagementListSenderIDsResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementListSenderIDsResponseShape> */
    use SdkModel;

    /** @var list<SenderID>|null $sender_ids */
    #[Api(list: SenderID::class, optional: true)]
    public ?array $sender_ids;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SenderID|array{
     *   sender_id?: string|null, status?: value-of<Status>|null
     * }> $sender_ids
     */
    public static function with(?array $sender_ids = null): self
    {
        $obj = new self;

        null !== $sender_ids && $obj['sender_ids'] = $sender_ids;

        return $obj;
    }

    /**
     * @param list<SenderID|array{
     *   sender_id?: string|null, status?: value-of<Status>|null
     * }> $senderIDs
     */
    public function withSenderIDs(array $senderIDs): self
    {
        $obj = clone $this;
        $obj['sender_ids'] = $senderIDs;

        return $obj;
    }
}
