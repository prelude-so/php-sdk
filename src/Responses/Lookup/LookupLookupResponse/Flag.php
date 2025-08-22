<?php

declare(strict_types=1);

namespace Prelude\Responses\Lookup\LookupLookupResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Flag implements ConverterSource
{
    use SdkEnum;

    public const PORTED = 'ported';

    public const TEMPORARY = 'temporary';
}
