<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam\Feedback;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    final public const VERIFICATION_STARTED = 'verification.started';

    final public const VERIFICATION_COMPLETED = 'verification.completed';
}
