<?php

declare(strict_types=1);

namespace Prelude\Parameters\LookupLookupParam;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Type implements ConverterSource
{
    use Enum;

    final public const CNAM = 'cnam';
}
