<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkResponse;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\Contracts\ResponseConverter;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID;

/**
 * A list of Sender ID.
 *
 * @phpstan-type verification_management_list_sender_ids_response = array{
 *   senderIDs?: list<SenderID>
 * }
 */
final class VerificationManagementListSenderIDsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<verification_management_list_sender_ids_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SenderID>|null $senderIDs */
    #[Api('sender_ids', list: SenderID::class, optional: true)]
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
     * @param list<SenderID> $senderIDs
     */
    public static function with(?array $senderIDs = null): self
    {
        $obj = new self;

        null !== $senderIDs && $obj->senderIDs = $senderIDs;

        return $obj;
    }

    /**
     * @param list<SenderID> $senderIDs
     */
    public function withSenderIDs(array $senderIDs): self
    {
        $obj = clone $this;
        $obj->senderIDs = $senderIDs;

        return $obj;
    }
}
