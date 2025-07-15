<?php

declare(strict_types=1);

namespace Prelude\Models\NewResponse;

final class Reason
{
    final public const EXPIRED_SIGNATURE = 'expired_signature';

    final public const IN_BLOCK_LIST = 'in_block_list';

    final public const INVALID_PHONE_LINE = 'invalid_phone_line';

    final public const INVALID_PHONE_NUMBER = 'invalid_phone_number';

    final public const INVALID_SIGNATURE = 'invalid_signature';

    final public const REPEATED_ATTEMPTS = 'repeated_attempts';

    final public const SUSPICIOUS = 'suspicious';
}
