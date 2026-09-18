<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event;

enum Type: string
{
    case CREATE = 'create';

    case ATTEMPT = 'attempt';

    case CHECK = 'check';

    case SIGNALS = 'signals';
}
