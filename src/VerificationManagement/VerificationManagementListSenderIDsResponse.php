<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID\Status;

/**
 * A list of Sender ID.
 *
 * @phpstan-type VerificationManagementListSenderIDsResponseShape = array{
 *   senderIDs?: list<SenderID>|null
 * }
 */
final class VerificationManagementListSenderIDsResponse implements BaseModel
{
    /** @use SdkModel<VerificationManagementListSenderIDsResponseShape> */
    use SdkModel;

    /** @var list<SenderID>|null $senderIDs */
    #[Optional('sender_ids', list: SenderID::class)]
    public ?array $senderIDs;

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
     *   senderID?: string|null, status?: value-of<Status>|null
     * }> $senderIDs
     */
    public static function with(?array $senderIDs = null): self
    {
        $obj = new self;

        null !== $senderIDs && $obj['senderIDs'] = $senderIDs;

        return $obj;
    }

    /**
     * @param list<SenderID|array{
     *   senderID?: string|null, status?: value-of<Status>|null
     * }> $senderIDs
     */
    public function withSenderIDs(array $senderIDs): self
    {
        $obj = clone $this;
        $obj['senderIDs'] = $senderIDs;

        return $obj;
    }
}
