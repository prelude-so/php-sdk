<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

/**
 * The method used for verifying this phone number.
 */
enum Method: string
{
    case EMAIL = 'email';

    case MESSAGE = 'message';

    case SILENT = 'silent';

    case VOICE = 'voice';
}
