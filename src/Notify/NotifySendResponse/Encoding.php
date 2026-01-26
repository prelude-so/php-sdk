<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendResponse;

/**
 * The SMS encoding type based on message content. GSM-7 supports standard characters (up to 160 chars per segment), while UCS-2 supports Unicode including emoji (up to 70 chars per segment). Only present for SMS messages.
 */
enum Encoding: string
{
    case GSM_7 = 'GSM-7';

    case UCS_2 = 'UCS-2';
}
