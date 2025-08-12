<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of feedback.
 *
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    public const VERIFICATION_STARTED = 'verification.started';

    public const VERIFICATION_COMPLETED = 'verification.completed';
}
