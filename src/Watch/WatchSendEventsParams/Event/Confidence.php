<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

/**
 * A confidence level you want to assign to the event.
 */
enum Confidence: string
{
    case MAXIMUM = 'maximum';

    case HIGH = 'high';

    case NEUTRAL = 'neutral';

    case LOW = 'low';

    case MINIMUM = 'minimum';
}
