<?php

declare(strict_types=1);

namespace Prelude\Verification\VerificationCreateParams\Options;

/**
 * The channel to prioritize when delivering the verification. Prelude prioritizes this channel on the first attempt and continues to prefer it on retries while an untried route on that channel remains; once those are exhausted, retries fall back to the next best available route. If the channel is unavailable (for example, when a verification is challenged), Prelude uses the best available route instead. Cannot be combined with `channels`.
 */
enum PreferredChannel: string
{
    case SMS = 'sms';

    case RCS = 'rcs';

    case WHATSAPP = 'whatsapp';

    case VIBER = 'viber';

    case ZALO = 'zalo';

    case TELEGRAM = 'telegram';
}
