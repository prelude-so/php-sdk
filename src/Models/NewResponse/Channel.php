<?php

declare(strict_types=1);

namespace Prelude\Models\NewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Channel implements StaticConverter
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
