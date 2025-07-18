<?php

declare(strict_types=1);

namespace Prelude\Responses\WatchSendFeedbacksResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Status implements ConverterSource
{
    use Enum;

    final public const SUCCESS = 'success';
}
