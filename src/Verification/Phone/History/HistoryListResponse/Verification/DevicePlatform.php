<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse\Verification;

/**
 * Platform of the end-user device, when known.
 */
enum DevicePlatform: string
{
    case ANDROID = 'android';

    case IOS = 'ios';

    case IPADOS = 'ipados';

    case TVOS = 'tvos';

    case WEB = 'web';
}
