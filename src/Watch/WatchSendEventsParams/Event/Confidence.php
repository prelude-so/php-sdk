<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

/**
 * The level of trust you place in this event, in increasing order of trust: `minimum`, `low`, `neutral`, `high`, `maximum`.
 * Prelude uses this value to weight your signals when scoring traffic — events flagged with `minimum` confidence indicate end-users you trust the least to be legitimate, and the pipeline will use these signals to filter them out.
 */
enum Confidence: string
{
    case MAXIMUM = 'maximum';

    case HIGH = 'high';

    case NEUTRAL = 'neutral';

    case LOW = 'low';

    case MINIMUM = 'minimum';
}
