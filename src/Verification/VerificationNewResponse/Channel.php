<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationNewResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

final class Channel implements ConverterSource
{
    use SdkEnum;

    public const RCS = 'rcs';

    public const SILENT = 'silent';

    public const SMS = 'sms';

    public const TELEGRAM = 'telegram';

    public const VIBER = 'viber';

    public const VOICE = 'voice';

    public const WHATSAPP = 'whatsapp';

    public const ZALO = 'zalo';
}
