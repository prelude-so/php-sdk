<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;

enum Channel: string
{
    case SMS = 'sms';

    case RCS = 'rcs';

    case WHATSAPP = 'whatsapp';

    case VIBER = 'viber';

    case ZALO = 'zalo';

    case TELEGRAM = 'telegram';

    case VOICE = 'voice';

    case SILENT = 'silent';
}
