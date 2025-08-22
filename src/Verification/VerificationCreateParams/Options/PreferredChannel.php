<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The preferred channel to be used in priority for verification.
 */
final class PreferredChannel implements ConverterSource
{
    use SdkEnum;

    public const SMS = 'sms';

    public const RCS = 'rcs';

    public const WHATSAPP = 'whatsapp';

    public const VIBER = 'viber';

    public const ZALO = 'zalo';

    public const TELEGRAM = 'telegram';
}
