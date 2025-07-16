<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options\AppRealm;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Platform implements StaticConverter
{
    use Enum;

    final public const ANDROID = 'android';
}
