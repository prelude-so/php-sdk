<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

use Prelude\Core\Serde\CoerceState;
use Prelude\Core\Serde\DumpState;

interface Converter
{
    public function coerce(mixed $value, CoerceState $state): mixed;

    public function dump(mixed $value, DumpState $state): mixed;
}
