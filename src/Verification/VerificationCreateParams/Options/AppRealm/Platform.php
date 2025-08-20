<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options\AppRealm;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The platform the SMS will be sent to. We are currently only supporting "android".
 *
 * @phpstan-type platform_alias = Platform::*
 */
final class Platform implements ConverterSource
{
    use SdkEnum;

    public const ANDROID = 'android';
}
