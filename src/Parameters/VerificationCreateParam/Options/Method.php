<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Method implements ConverterSource
{
    use Enum;

    final public const AUTO = 'auto';

    final public const VOICE = 'voice';
}
