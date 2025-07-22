<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The reason why the verification was blocked. Only present when status is "blocked".
 *
 * @phpstan-type reason_alias = Reason::*
 */
final class Reason implements ConverterSource
{
    use Enum;

    final public const EXPIRED_SIGNATURE = 'expired_signature';

    final public const IN_BLOCK_LIST = 'in_block_list';

    final public const INVALID_PHONE_LINE = 'invalid_phone_line';

    final public const INVALID_PHONE_NUMBER = 'invalid_phone_number';

    final public const INVALID_SIGNATURE = 'invalid_signature';

    final public const REPEATED_ATTEMPTS = 'repeated_attempts';

    final public const SUSPICIOUS = 'suspicious';
}
