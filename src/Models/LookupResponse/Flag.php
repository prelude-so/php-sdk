<?php

declare(strict_types=1);

namespace Prelude\Models\LookupResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Flag implements StaticConverter
{
    use Enum;

    final public const PORTED = 'ported';

    final public const TEMPORARY = 'temporary';
}
