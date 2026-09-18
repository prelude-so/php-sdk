<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Attempt;

enum Status: string
{
    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';
}
