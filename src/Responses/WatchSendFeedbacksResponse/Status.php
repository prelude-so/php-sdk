<?php

declare(strict_types=1);

namespace Prelude\Responses\WatchSendFeedbacksResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the feedbacks sending.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    final public const SUCCESS = 'success';
}
