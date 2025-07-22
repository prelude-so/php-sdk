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

    final public const MESSAGE = 'message';

    final public const SILENT = 'silent';

    final public const VOICE = 'voice';
}
