<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

/**
 * How much this event tells us to trust the end-user's legitimacy — not how certain you are that the event occurred. In increasing order of trust: `minimum`, `low`, `neutral`, `high`, `maximum`.
 *
 * Use `minimum` for an event tied to a user you trust the least to be legitimate (e.g. a `payment.chargeback`), and `maximum` for an event tied to a highly trustworthy user (e.g. a confirmed 3DS payment). Prelude weights these signals when scoring traffic: it filters out users tied to low-confidence events while preserving the experience for users tied to high-confidence ones.
 */
enum Confidence: string
{
    case MAXIMUM = 'maximum';

    case HIGH = 'high';

    case NEUTRAL = 'neutral';

    case LOW = 'low';

    case MINIMUM = 'minimum';
}
