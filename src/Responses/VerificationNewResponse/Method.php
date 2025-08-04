<?php

declare(strict_types=1);

namespace Prelude\Responses\VerificationNewResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The method used for verifying this phone number.
 *
 * @phpstan-type method_alias = Method::*
 */
final class Method implements ConverterSource
{
    use Enum;

    public const MESSAGE = 'message';

    public const SILENT = 'silent';

    public const VOICE = 'voice';
}
