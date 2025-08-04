<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationCheckResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the check.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    public const SUCCESS = 'success';

    public const FAILURE = 'failure';

    public const EXPIRED_OR_NOT_FOUND = 'expired_or_not_found';
}
