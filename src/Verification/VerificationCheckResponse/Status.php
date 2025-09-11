<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCheckResponse;

/**
 * The status of the check.
 */
enum Status: string
{
    case SUCCESS = 'success';

    case FAILURE = 'failure';

    case EXPIRED_OR_NOT_FOUND = 'expired_or_not_found';
}
