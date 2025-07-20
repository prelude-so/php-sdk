<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationCheckResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    final public const SUCCESS = 'success';

    final public const FAILURE = 'failure';

    final public const EXPIRED_OR_NOT_FOUND = 'expired_or_not_found';
}
