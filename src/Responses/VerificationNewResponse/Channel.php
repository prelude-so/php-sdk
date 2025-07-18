<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Channel implements ConverterSource
{
    use Enum;

    final public const SMS = 'sms';

    final public const RCS = 'rcs';

    final public const WHATSAPP = 'whatsapp';

    final public const VIBER = 'viber';

    final public const ZALO = 'zalo';

    final public const TELEGRAM = 'telegram';

    final public const SILENT = 'silent';

    final public const VOICE = 'voice';
}
