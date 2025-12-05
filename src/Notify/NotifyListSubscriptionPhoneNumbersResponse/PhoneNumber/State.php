<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumbersResponse\PhoneNumber;

/**
 * The subscription state:
 *   * `SUB` - Subscribed (user can receive marketing messages)
 *   * `UNSUB` - Unsubscribed (user has opted out)
 */
enum State: string
{
    case SUB = 'SUB';

    case UNSUB = 'UNSUB';
}
