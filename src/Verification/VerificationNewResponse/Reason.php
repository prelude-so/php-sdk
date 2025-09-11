<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

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
enum Reason: string
{
    case EXPIRED_SIGNATURE = 'expired_signature';

    case IN_BLOCK_LIST = 'in_block_list';

    case INVALID_PHONE_LINE = 'invalid_phone_line';

    case INVALID_PHONE_NUMBER = 'invalid_phone_number';

    case INVALID_SIGNATURE = 'invalid_signature';

    case REPEATED_ATTEMPTS = 'repeated_attempts';

    case SUSPICIOUS = 'suspicious';
}
