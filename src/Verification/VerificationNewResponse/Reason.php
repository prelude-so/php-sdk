<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The reason why the verification was blocked. Only present when status is "blocked".
 */
final class Reason implements ConverterSource
{
    use SdkEnum;

    public const EXPIRED_SIGNATURE = 'expired_signature';

    public const IN_BLOCK_LIST = 'in_block_list';

    public const INVALID_PHONE_LINE = 'invalid_phone_line';

    public const INVALID_PHONE_NUMBER = 'invalid_phone_number';

    public const INVALID_SIGNATURE = 'invalid_signature';

    public const REPEATED_ATTEMPTS = 'repeated_attempts';

    public const SUSPICIOUS = 'suspicious';
}
