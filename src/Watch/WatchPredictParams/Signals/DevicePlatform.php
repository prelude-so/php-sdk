<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchPredictParams\Signals;

/**
 * The type of the user's device.
 */
enum DevicePlatform: string
{
    case ANDROID = 'android';

    case IOS = 'ios';

    case IPADOS = 'ipados';

    case TVOS = 'tvos';

    case WEB = 'web';
}
