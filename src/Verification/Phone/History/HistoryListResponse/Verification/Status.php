<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListResponse\Verification;

/**
 * The outcome of the verification.
 *  * `converted` - The end user submitted a valid code.
 *  * `not_converted` - The verification expired without a valid code.
 *  * `pending_check` - A code was delivered and Prelude is still waiting for a check.
 *  * `sent` - A code was sent and the verification window is still open.
 *  * `challenged` - The verification was restricted to non-SMS and non-voice channels.
 *  * `suspected_fraud` - The anti-fraud system blocked the verification.
 *  * `in_blocklist` - The phone number is on the configured block list.
 *  * `invalid_line` - The phone number is not a valid line type.
 *  * `invalid_number` - The phone number is not a valid number.
 *  * `rate_limited` - The verification was refused by a rate limit.
 *  * `expired_signals` - The SDK signals were collected too long before the request.
 *  * `shadowed` - The anti-fraud system flagged the verification without blocking it.
 */
enum Status: string
{
    case CONVERTED = 'converted';

    case NOT_CONVERTED = 'not_converted';

    case PENDING_CHECK = 'pending_check';

    case SENT = 'sent';

    case CHALLENGED = 'challenged';

    case SUSPECTED_FRAUD = 'suspected_fraud';

    case IN_BLOCKLIST = 'in_blocklist';

    case INVALID_LINE = 'invalid_line';

    case INVALID_NUMBER = 'invalid_number';

    case RATE_LIMITED = 'rate_limited';

    case EXPIRED_SIGNALS = 'expired_signals';

    case SHADOWED = 'shadowed';
}
