<?php

declare(strict_types=1);

namespace Prelude\Core\Concerns;

use Prelude\Core\Serde\CoerceState;
use Prelude\Core\Serde\DumpState;

/**
 * @internal
 */
trait Union
{
    public static function introspect(): void {}

    public static function discriminator(): ?string // @phpstan-ignore-line
    {
        return null;
    }

    /**
     * @return list<string|Converter|StaticConverter>|array<
     *   string, string|Converter|StaticConverter
     * >
     */
    public static function variants(): array
    {
        return [];
    }

    public static function coerce(mixed $value, CoerceState $state): mixed
    {
        return $value;
    }

    public static function dump(mixed $value, DumpState $state): mixed
    {
        return $value;
    }
}
