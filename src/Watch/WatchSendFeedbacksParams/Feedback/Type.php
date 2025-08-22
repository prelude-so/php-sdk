<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

use Prelude\Core\Concerns\SdkEnum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of feedback.
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const VERIFICATION_STARTED = 'verification.started';

    public const VERIFICATION_COMPLETED = 'verification.completed';
}
