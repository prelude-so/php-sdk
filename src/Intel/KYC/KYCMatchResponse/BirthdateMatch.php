<?php

declare(strict_types=1);

namespace Prelude\Intel\KYC\KYCMatchResponse;

/**
 * Whether the date of birth matched the operator's record. Compared exactly; never scored.
 */
enum BirthdateMatch: string
{
    case TRUE = 'true';

    case FALSE = 'false';

    case NOT_AVAILABLE = 'not_available';
}
