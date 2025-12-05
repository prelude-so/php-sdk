<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionPhoneNumbersParams;

/**
 * Filter by subscription state.
 */
enum State: string
{
    case SUB = 'SUB';

    case UNSUB = 'UNSUB';
}
