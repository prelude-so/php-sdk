<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type channel_alias = Channel::*
 */
final class Channel implements ConverterSource
{
    use Enum;

    public const SMS = 'sms';

    public const RCS = 'rcs';

    public const WHATSAPP = 'whatsapp';

    public const VIBER = 'viber';

    public const ZALO = 'zalo';

    public const TELEGRAM = 'telegram';

    public const SILENT = 'silent';

    public const VOICE = 'voice';
}
