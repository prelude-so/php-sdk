<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupParams;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const CNAM = 'cnam';
}
