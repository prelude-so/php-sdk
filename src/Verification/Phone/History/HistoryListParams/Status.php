<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryListParams;

/**
 * Only verifications in this status. `pending_check` cannot be filtered on.
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
