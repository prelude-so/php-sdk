<?php

declare(strict_types=1);

namespace Prelude\Responses\Lookup\LookupLookupResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type flag_alias = Flag::*
 */
final class Flag implements ConverterSource
{
    use SdkEnum;

    public const PORTED = 'ported';

    public const TEMPORARY = 'temporary';
}
