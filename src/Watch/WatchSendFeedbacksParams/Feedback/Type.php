<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksParams\Feedback;

/**
 * The type of feedback.
 */
enum Type: string
{
    case VERIFICATION_STARTED = 'verification.started';

    case VERIFICATION_COMPLETED = 'verification.completed';
}
