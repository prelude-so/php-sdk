<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam\Feedback\Signals;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class DevicePlatform implements StaticConverter
{
    use Enum;

    final public const ANDROID = 'android';

    final public const IOS = 'ios';

    final public const IPADOS = 'ipados';

    final public const TVOS = 'tvos';

    final public const WEB = 'web';
}

DevicePlatform::__introspect();
