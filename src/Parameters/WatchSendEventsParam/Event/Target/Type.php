<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendEventsParam\Event\Target;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of the target. Either "phone_number" or "email_address".
 *
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    final public const PHONE_NUMBER = 'phone_number';

    final public const EMAIL_ADDRESS = 'email_address';
}
