<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

/**
 * The preferred channel to be used in priority for verification.
 */
enum PreferredChannel: string
{
    case SMS = 'sms';

    case RCS = 'rcs';

    case WHATSAPP = 'whatsapp';

    case VIBER = 'viber';

    case ZALO = 'zalo';

    case TELEGRAM = 'telegram';
}
