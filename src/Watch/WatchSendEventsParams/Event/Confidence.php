<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * A confidence level you want to assign to the event.
 */
final class Confidence implements ConverterSource
{
    use SdkEnum;

    public const MAXIMUM = 'maximum';

    public const HIGH = 'high';

    public const NEUTRAL = 'neutral';

    public const LOW = 'low';

    public const MINIMUM = 'minimum';
}
