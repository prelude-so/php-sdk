<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchPredictParam\Target;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Type implements StaticConverter
{
    use Enum;

    final public const PHONE_NUMBER = 'phone_number';

    final public const EMAIL_ADDRESS = 'email_address';
}
