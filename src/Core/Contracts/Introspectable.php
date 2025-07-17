<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

/**
 * @internal
 */
interface Introspectable
{
    /**
     * @internal
     */
    public static function introspect(): void;
}
