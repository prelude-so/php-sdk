<?php

declare(strict_types=1);

namespace Prelude\Responses\LookupLookupResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type flag_alias = Flag::*
 */
final class Flag implements ConverterSource
{
    use Enum;

    public const PORTED = 'ported';

    public const TEMPORARY = 'temporary';
}
