<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifySendParams;

/**
 * The preferred channel to be used in priority for message delivery. If the channel is unavailable, the system will fallback to other available channels.
 */
enum PreferredChannel: string
{
    case SMS = 'sms';

    case WHATSAPP = 'whatsapp';
}
