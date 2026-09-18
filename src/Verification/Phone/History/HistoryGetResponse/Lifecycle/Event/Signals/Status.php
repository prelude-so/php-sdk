<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Signals;

enum Status: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';
}
