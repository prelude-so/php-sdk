<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

/**
 * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages.
 */
enum Method: string
{
    case AUTO = 'auto';

    case VOICE = 'voice';
}
