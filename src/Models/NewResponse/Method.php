<?php

declare(strict_types=1);

namespace Prelude\Models\NewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Method implements StaticConverter
{
    use Enum;

    final public const MESSAGE = 'message';

    final public const SILENT = 'silent';

    final public const VOICE = 'voice';
}

Method::__introspect();
