<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback\Signals;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of the user's device.
 *
 * @phpstan-type device_platform_alias = DevicePlatform::*
 */
final class DevicePlatform implements ConverterSource
{
    use SdkEnum;

    public const ANDROID = 'android';

    public const IOS = 'ios';

    public const IPADOS = 'ipados';

    public const TVOS = 'tvos';

    public const WEB = 'web';
}
