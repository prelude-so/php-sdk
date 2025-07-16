<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Prelude\Core\Serde\CoerceState;
use Prelude\Core\Serde\DumpState;

trait Enum
{
    public static function _introspect(): void {}

    public static function coerce(mixed $value, CoerceState $state): mixed
    {
        return $value;
    }

    public static function dump(mixed $value, DumpState $state): mixed
    {
        return $value;
    }
}
