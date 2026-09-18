<?php

declare(strict_types=1);

namespace Prelude\Intel\KYC\KYCMatchResponse;

/**
 * Whether the street address matched the operator's record.
 */
enum AddressMatch: string
{
    case TRUE = 'true';

    case FALSE = 'false';

    case NOT_AVAILABLE = 'not_available';
}
