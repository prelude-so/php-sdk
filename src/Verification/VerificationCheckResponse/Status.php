<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCheckResponse;

/**
 * The status of the check. For `prelude:psd2` codes, `transaction_missing` is returned when the `psd2` block is omitted, and `transaction_mismatch` when the submitted variables differ from those provided at issuance.
 */
enum Status: string
{
    case SUCCESS = 'success';

    case FAILURE = 'failure';

    case EXPIRED_OR_NOT_FOUND = 'expired_or_not_found';

    case TRANSACTION_MISSING = 'transaction_missing';

    case TRANSACTION_MISMATCH = 'transaction_mismatch';
}
