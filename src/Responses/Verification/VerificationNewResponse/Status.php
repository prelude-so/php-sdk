<?php

declare(strict_types=1);

namespace Prelude\Responses\Verification\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The status of the verification.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    public const SUCCESS = 'success';

    public const RETRY = 'retry';

    public const BLOCKED = 'blocked';
}
