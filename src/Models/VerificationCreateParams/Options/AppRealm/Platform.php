<?php

declare(strict_types=1);

namespace Prelude\Models\VerificationCreateParams\Options\AppRealm;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The platform the SMS will be sent to. We are currently only supporting "android".
 *
 * @phpstan-type platform_alias = Platform::*
 */
final class Platform implements ConverterSource
{
    use Enum;

    public const ANDROID = 'android';
}
