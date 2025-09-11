<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

enum Channel: string
{
    case RCS = 'rcs';

    case SILENT = 'silent';

    case SMS = 'sms';

    case TELEGRAM = 'telegram';

    case VIBER = 'viber';

    case VOICE = 'voice';

    case WHATSAPP = 'whatsapp';

    case ZALO = 'zalo';
}
