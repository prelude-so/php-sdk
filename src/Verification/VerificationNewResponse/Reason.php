<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The reason why the verification was blocked. Only present when status is "blocked".
 *  * `expired_signature` - The signature of the SDK signals is expired. They should be sent within
 *    the hour following their collection.
 *  * `in_block_list` - The phone number is part of the configured block list.
 *  * `invalid_phone_line` - The phone number is not a valid line number (e.g. landline).
 *  * `invalid_phone_number` - The phone number is not a valid phone number (e.g. unallocated range).
 *  * `invalid_signature` - The signature of the SDK signals is invalid.
 *  * `repeated_attempts` - The phone number has made too many verification attempts.
 *  * `suspicious` - The verification attempt was deemed suspicious by the anti-fraud system.
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
