<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options\AppRealm;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type platform_alias = Platform::*
 */
final class Platform implements ConverterSource
{
    use Enum;

    final public const ANDROID = 'android';
}
