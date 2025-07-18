<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Prelude\Core\Conversion\CoerceState;
use Prelude\Core\Conversion\DumpState;

trait Enum
{
    public static function introspect(): void {}

    public static function coerce(mixed $value, CoerceState $state): mixed
    {
        return $value;
    }

    public static function dump(mixed $value, DumpState $state): mixed
    {
        return $value;
    }
}
