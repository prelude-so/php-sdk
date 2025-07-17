<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

use Prelude\Core\Serde\CoerceState;
use Prelude\Core\Serde\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
