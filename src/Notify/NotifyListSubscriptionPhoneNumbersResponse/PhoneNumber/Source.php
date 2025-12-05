<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber;

/**
 * How the subscription state was changed:
 *   * `MO_KEYWORD` - User sent a keyword (STOP/START)
 *   * `API` - Changed via API
 *   * `CSV_IMPORT` - Imported from CSV
 *   * `CARRIER_DISCONNECT` - Automatically unsubscribed due to carrier disconnect
 */
enum Source: string
{
    case MO_KEYWORD = 'MO_KEYWORD';

    case API = 'API';

    case CSV_IMPORT = 'CSV_IMPORT';

    case CARRIER_DISCONNECT = 'CARRIER_DISCONNECT';
}
