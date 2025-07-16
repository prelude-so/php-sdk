<?php

declare(strict_types=1);

namespace Prelude\Models\SendEventsResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Status implements StaticConverter
{
    use Enum;

    final public const SUCCESS = 'success';
}
