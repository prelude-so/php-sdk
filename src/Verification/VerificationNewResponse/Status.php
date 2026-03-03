<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

/**
 * The status of the verification.
 *  * `success` - A new verification window was created.
 *  * `retry` - A new attempt was created for an existing verification window.
 *  * `challenged` - The verification is suspicious and is restricted to non-SMS and non-voice channels only. This mode must be enabled for your customer account by Prelude support.
 *  * `blocked` - The verification was blocked.
 */
enum Status: string
{
    case SUCCESS = 'success';

    case RETRY = 'retry';

    case CHALLENGED = 'challenged';

    case BLOCKED = 'blocked';
}
