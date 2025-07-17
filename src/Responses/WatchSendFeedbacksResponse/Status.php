<?php

declare(strict_types=1);

namespace Prelude\Responses\WatchSendFeedbacksResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Status implements StaticConverter
{
    use Enum;

    final public const SUCCESS = 'success';
}
