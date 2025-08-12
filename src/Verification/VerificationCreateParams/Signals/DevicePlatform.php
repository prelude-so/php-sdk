<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Signals;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of the user's device.
 *
 * @phpstan-type device_platform_alias = DevicePlatform::*
 */
final class DevicePlatform implements ConverterSource
{
    use Enum;

    public const ANDROID = 'android';

    public const IOS = 'ios';

    public const IPADOS = 'ipados';

    public const TVOS = 'tvos';

    public const WEB = 'web';
}
