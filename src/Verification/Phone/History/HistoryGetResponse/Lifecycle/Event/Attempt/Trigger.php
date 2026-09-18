<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;

/**
 * What caused the attempt.
 */
enum Trigger: string
{
    case INITIAL = 'initial';

    case AUTO_RETRY = 'auto_retry';

    case USER_RETRY = 'user_retry';
}
