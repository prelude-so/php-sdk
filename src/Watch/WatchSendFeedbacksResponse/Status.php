<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendFeedbacksResponse;

/**
 * The status of the feedbacks sending.
 */
enum Status: string
{
    case SUCCESS = 'success';
}
