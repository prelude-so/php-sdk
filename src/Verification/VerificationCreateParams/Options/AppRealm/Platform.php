<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options\AppRealm;

/**
 * The platform for automatic OTP retrieval. Use "android" for the SMS Retriever API or "web" for the WebOTP API.
 */
enum Platform: string
{
    case ANDROID = 'android';

    case WEB = 'web';
}
