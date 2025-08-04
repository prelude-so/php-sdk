<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendEventsParam\Event;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * A confidence level you want to assign to the event.
 *
 * @phpstan-type confidence_alias = Confidence::*
 */
final class Confidence implements ConverterSource
{
    use Enum;

    public const MAXIMUM = 'maximum';

    public const HIGH = 'high';

    public const NEUTRAL = 'neutral';

    public const LOW = 'low';

    public const MINIMUM = 'minimum';
}
