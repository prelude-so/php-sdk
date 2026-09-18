<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse\Verification;

/**
 * Whether the phone number was allow-listed, block-listed, or sandboxed at verification time.
 */
enum PhoneNumberCondition: string
{
    case ALLOW_LISTED = 'allow_listed';

    case BLOCK_LISTED = 'block_listed';

    case SANDBOXED = 'sandboxed';
}
