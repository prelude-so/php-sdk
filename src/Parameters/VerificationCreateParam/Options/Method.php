<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Method implements StaticConverter
{
    use Enum;

    final public const AUTO = 'auto';

    final public const VOICE = 'voice';
}

Method::__introspect();
