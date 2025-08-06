<?php

declare(strict_types=1);

namespace Prelude\Parameters\VerificationCreateParams\Options;

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

    public const SMS = 'sms';

    public const RCS = 'rcs';

    public const WHATSAPP = 'whatsapp';

    public const VIBER = 'viber';

    public const ZALO = 'zalo';

    public const TELEGRAM = 'telegram';
}
