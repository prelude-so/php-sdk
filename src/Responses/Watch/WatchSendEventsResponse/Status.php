<?php

declare(strict_types=1);

namespace Prelude\Responses\Watch\WatchSendEventsResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the events dispatch.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const SUCCESS = 'success';
}
