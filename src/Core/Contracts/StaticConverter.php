<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

use Prelude\Core\Serde\CoerceState;
use Prelude\Core\Serde\DumpState;

/**
 * @internal
 */
interface StaticConverter extends Introspectable
{
    /**
     * @internal
     */
    public static function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public static function dump(mixed $value, DumpState $state): mixed;
}
