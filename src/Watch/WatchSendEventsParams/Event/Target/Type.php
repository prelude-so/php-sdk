<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsParams\Event\Target;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of the target. Either "phone_number" or "email_address".
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const PHONE_NUMBER = 'phone_number';

    public const EMAIL_ADDRESS = 'email_address';
}
