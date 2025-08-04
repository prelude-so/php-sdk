<?php

declare(strict_types=1);

namespace Prelude\Responses\LookupLookupResponse;

use Prelude\Core\Concerns\Enum;
use Prelude\Core\Conversion\Contracts\ConverterSource;

/**
 * The type of phone line.
 *   * `calling_cards` - Numbers that are associated with providers of pre-paid domestic and international calling cards.
 *   * `fixed_line` - Landline phone numbers.
 *   * `isp` - Numbers reserved for Internet Service Providers.
 *   * `local_rate` - Numbers that can be assigned non-geographically.
 *   * `mobile` - Mobile phone numbers.
 *   * `other` - Other types of services.
 *   * `pager` - Number ranges specifically allocated to paging devices.
 *   * `payphone` - Allocated numbers for payphone kiosks in some countries.
 *   * `premium_rate` - Landline numbers where the calling party pays more than standard.
 *   * `satellite` - Satellite phone numbers.
 *   * `service` - Automated applications.
 *   * `shared_cost` - Specific landline ranges where the cost of making the call is shared between the calling and called party.
 *   * `short_codes_commercial` - Short codes are memorable, easy-to-use numbers, like the UK's NHS 111, often sold to businesses. Not available in all countries.
 *   * `toll_free` - Number where the called party pays for the cost of the call not the calling party.
 *   * `universal_access` - Number ranges reserved for Universal Access initiatives.
 *   * `unknown` - Unknown phone number type.
 *   * `vpn` - Numbers are used exclusively within a private telecommunications network, connecting the operator's terminals internally and not accessible via the public telephone network.
 *   * `voice_mail` - A specific category of Interactive Voice Response (IVR) services.
 *   * `voip` - Specific ranges for providers of VoIP services to allow incoming calls from the regular telephony network.
 *
 * @phpstan-type line_type_alias = LineType::*
 */
final class LineType implements ConverterSource
{
    use Enum;

    public const CALLING_CARDS = 'calling_cards';

    public const FIXED_LINE = 'fixed_line';

    public const ISP = 'isp';

    public const LOCAL_RATE = 'local_rate';

    public const MOBILE = 'mobile';

    public const OTHER = 'other';

    public const PAGER = 'pager';

    public const PAYPHONE = 'payphone';

    public const PREMIUM_RATE = 'premium_rate';

    public const SATELLITE = 'satellite';

    public const SERVICE = 'service';

    public const SHARED_COST = 'shared_cost';

    public const SHORT_CODES_COMMERCIAL = 'short_codes_commercial';

    public const TOLL_FREE = 'toll_free';

    public const UNIVERSAL_ACCESS = 'universal_access';

    public const UNKNOWN = 'unknown';

    public const VPN = 'vpn';

    public const VOICE_MAIL = 'voice_mail';

    public const VOIP = 'voip';
}
