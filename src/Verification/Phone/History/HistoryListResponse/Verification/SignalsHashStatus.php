<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse\Verification;

/**
 * Whether the SDK signals integrity check passed.
 */
enum SignalsHashStatus: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';
}
