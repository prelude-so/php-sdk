<?php

declare(strict_types=1);

namespace Prelude\Transactional\TransactionalSendParams;

/**
 * The preferred delivery channel for the message. When specified, the system will prioritize sending via the requested channel if the template is configured for it.
 *
 * If not specified and the template is configured for WhatsApp, the message will be sent via WhatsApp first, with automatic fallback to SMS if WhatsApp delivery is unavailable.
 *
 * Supported channels: `sms`, `whatsapp`.
 */
enum PreferredChannel: string
{
    case SMS = 'sms';

    case WHATSAPP = 'whatsapp';
}
