<?php

declare(strict_types=1);

namespace Prelude\Models\LookupResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Contracts\StaticConverter;

final class LineType implements StaticConverter
{
    use Enum;

    final public const CALLING_CARDS = 'calling_cards';

    final public const FIXED_LINE = 'fixed_line';

    final public const ISP = 'isp';

    final public const LOCAL_RATE = 'local_rate';

    final public const MOBILE = 'mobile';

    final public const OTHER = 'other';

    final public const PAGER = 'pager';

    final public const PAYPHONE = 'payphone';

    final public const PREMIUM_RATE = 'premium_rate';

    final public const SATELLITE = 'satellite';

    final public const SERVICE = 'service';

    final public const SHARED_COST = 'shared_cost';

    final public const SHORT_CODES_COMMERCIAL = 'short_codes_commercial';

    final public const TOLL_FREE = 'toll_free';

    final public const UNIVERSAL_ACCESS = 'universal_access';

    final public const UNKNOWN = 'unknown';

    final public const VPN = 'vpn';

    final public const VOICE_MAIL = 'voice_mail';

    final public const VOIP = 'voip';
}

LineType::__introspect();
