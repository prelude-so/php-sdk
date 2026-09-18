<?php

declare(strict_types=1);

namespace Prelude\Verification\Phone\History\HistoryGetResponse\Lifecycle\Event\Check;

/**
 * Why an invalid check failed, when known.
 */
enum StatusDetail: string
{
    case EXPIRED_ATTEMPT = 'expired_attempt';

    case EXPIRED_AUTH = 'expired_auth';

    case RATE_LIMITED = 'rate_limited';

    case TRANSACTION_MISSING = 'transaction_missing';

    case TRANSACTION_MISMATCH = 'transaction_mismatch';
}
