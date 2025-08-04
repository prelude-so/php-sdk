<?php

declare(strict_types=1);

namespace Prelude\Parameters\LookupLookupParam;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    public const CNAM = 'cnam';
}
