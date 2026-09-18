<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse;

/**
 * Whether the phone number is currently allow-listed, block-listed, or sandboxed.
 */
enum PhoneNumberCurrentCondition: string
{
    case ALLOW_LISTED = 'allow_listed';

    case BLOCK_LISTED = 'block_listed';

    case SANDBOXED = 'sandboxed';
}
