<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchPredictParams\Target;

/**
 * The type of the target. Either "phone_number" or "email_address".
 */
enum Type: string
{
    case PHONE_NUMBER = 'phone_number';

    case EMAIL_ADDRESS = 'email_address';
}
