<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse\SenderID;

/**
 * It indicates the status of the Sender ID. Possible values are:
 *   * `approved` - The Sender ID is approved.
 *   * `pending` - The Sender ID is pending.
 *   * `rejected` - The Sender ID is rejected.
 */
enum Status: string
{
    case APPROVED = 'approved';

    case PENDING = 'pending';

    case REJECTED = 'rejected';
}
