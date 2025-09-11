<?php

declare(strict_types=1);

namespace Prelude\Watch\WatchSendEventsResponse;

/**
 * The status of the events dispatch.
 */
enum Status: string
{
    case SUCCESS = 'success';
}
