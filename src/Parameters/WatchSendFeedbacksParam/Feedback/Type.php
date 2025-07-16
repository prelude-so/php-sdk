<?php

declare(strict_types=1);

namespace Prelude\Parameters\WatchSendFeedbacksParam\Feedback;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class Type implements StaticConverter
{
    use Enum;

    final public const VERIFICATION_STARTED = 'verification.started';

    final public const VERIFICATION_COMPLETED = 'verification.completed';
}
