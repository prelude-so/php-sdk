<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

enum Channel: string
{
    case SMS = 'sms';

    case RCS = 'rcs';

    case WHATSAPP = 'whatsapp';

    case VIBER = 'viber';

    case ZALO = 'zalo';

    case TELEGRAM = 'telegram';
}
