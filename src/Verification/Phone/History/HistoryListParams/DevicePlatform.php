<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListParams;

/**
 * Only verifications created from this device platform.
 */
enum DevicePlatform: string
{
    case ANDROID = 'android';

    case IOS = 'ios';

    case IPADOS = 'ipados';

    case TVOS = 'tvos';

    case WEB = 'web';
}
