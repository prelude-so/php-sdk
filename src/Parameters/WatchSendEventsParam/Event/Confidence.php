<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendEventsParam\Event;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Confidence implements ConverterSource
{
    use Enum;

    final public const MAXIMUM = 'maximum';

    final public const HIGH = 'high';

    final public const NEUTRAL = 'neutral';

    final public const LOW = 'low';

    final public const MINIMUM = 'minimum';
}
