<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options\AppRealm;

/**
 * The platform the SMS will be sent to. We are currently only supporting "android".
 */
enum Platform: string
{
    case ANDROID = 'android';
}
