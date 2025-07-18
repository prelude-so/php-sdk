<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Status implements ConverterSource
{
    use Enum;

    final public const SUCCESS = 'success';

    final public const RETRY = 'retry';

    final public const BLOCKED = 'blocked';
}
