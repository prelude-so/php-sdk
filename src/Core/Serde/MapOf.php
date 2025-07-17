<?php

declare(strict_types=1);

namespace Prelude\Core\Serde;

use Prelude\Core\Concerns\ArrayOf;
use Prelude\Core\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
