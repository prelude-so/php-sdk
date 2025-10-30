<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

/**
 * The method used for verifying this phone number. The 'voice' option provides an accessible alternative for visually impaired users by delivering the verification code through a phone call rather than a text message. It also allows verification of landline numbers that cannot receive SMS messages. The 'message' option explicitly requests message delivery (SMS, WhatsApp ...) and skips silent verification, useful for scenarios requiring direct user interaction.
 */
enum Method: string
{
    case AUTO = 'auto';

    case VOICE = 'voice';

    case MESSAGE = 'message';
}
