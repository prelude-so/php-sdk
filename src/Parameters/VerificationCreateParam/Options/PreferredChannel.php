<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParam\Options;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The preferred channel to be used in priority for verification.
 *
 * @phpstan-type preferred_channel_alias = PreferredChannel::*
 */
final class PreferredChannel implements ConverterSource
{
    use Enum;

    final public const SMS = 'sms';

    final public const RCS = 'rcs';

    final public const WHATSAPP = 'whatsapp';

    final public const VIBER = 'viber';

    final public const ZALO = 'zalo';

    final public const TELEGRAM = 'telegram';
}
