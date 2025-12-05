<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendBatchParams;

/**
 * Preferred channel for delivery. If unavailable, automatic fallback applies.
 */
enum PreferredChannel: string
{
    case SMS = 'sms';

    case WHATSAPP = 'whatsapp';
}
