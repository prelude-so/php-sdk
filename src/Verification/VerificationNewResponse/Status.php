<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

/**
 * The status of the verification.
 */
enum Status: string
{
    case SUCCESS = 'success';

    case RETRY = 'retry';

    case BLOCKED = 'blocked';
}
