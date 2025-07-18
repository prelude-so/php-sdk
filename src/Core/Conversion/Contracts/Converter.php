<?php

declare(strict_types=1);

namespace Prelude\Core\Conversion\Contracts;

use Prelude\Core\Conversion\CoerceState;
use Prelude\Core\Conversion\DumpState;

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
