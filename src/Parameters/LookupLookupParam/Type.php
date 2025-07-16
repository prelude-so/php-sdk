<?php

declare(strict_types=1);

namespace Prelude\Parameters\LookupLookupParam;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Type implements StaticConverter
{
    use Enum;

    final public const CNAM = 'cnam';
}
