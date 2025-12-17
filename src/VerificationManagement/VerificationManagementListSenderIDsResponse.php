<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID;

/**
 * A list of Sender ID.
 *
 * @phpstan-import-type SenderIDShape from \Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID
 *
 * @phpstan-type VerificationManagementListSenderIDsResponseShape = array{
 *   senderIDs?: list<SenderIDShape>|null
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
     * @param list<SenderIDShape>|null $senderIDs
     */
    public static function with(?array $senderIDs = null): self
    {
        $self = new self;

        null !== $senderIDs && $self['senderIDs'] = $senderIDs;

        return $self;
    }

    /**
     * @param list<SenderIDShape> $senderIDs
     */
    public function withSenderIDs(array $senderIDs): self
    {
        $self = clone $this;
        $self['senderIDs'] = $senderIDs;

        return $self;
    }
}
