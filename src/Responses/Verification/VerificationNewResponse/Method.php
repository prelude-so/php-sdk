<?php

declare(strict_types=1);

namespace Prelude\Responses\Verification\VerificationNewResponse;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The method used for verifying this phone number.
 */
final class Method implements ConverterSource
{
    use SdkEnum;

    public const EMAIL = 'email';

    public const MESSAGE = 'message';

    public const SILENT = 'silent';

    public const VOICE = 'voice';
}
