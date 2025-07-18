<?php

declare(strict_types=1);

namespace Prelude\Core\Conversion;

use Prelude\Core\Conversion\Concerns\ArrayOf;
use Prelude\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
