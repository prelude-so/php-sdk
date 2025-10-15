<?php

declare(strict_types=1);

namespace Prelude\VerificationManagement\VerificationManagementListSenderIDsResponseItem;

/**
 * It indicates the status of the sender ID. Possible values are:
 *   * `approved` - The sender ID is approved.
 *   * `pending` - The sender ID is pending.
 *   * `rejected` - The sender ID is rejected.
 */
enum Status: string
{
    case APPROVED = 'approved';

    case PENDING = 'pending';

    case REJECTED = 'rejected';
}
