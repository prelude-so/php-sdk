<?php

declare(strict_types=1);

namespace Prelude\Models\NewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Reason implements StaticConverter
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
