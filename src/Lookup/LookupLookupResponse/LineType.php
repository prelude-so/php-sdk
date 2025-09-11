<?php

declare(strict_types=1);

namespace Prelude\Lookup\LookupLookupResponse;

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
 */
enum LineType: string
{
    case CALLING_CARDS = 'calling_cards';

    case FIXED_LINE = 'fixed_line';

    case ISP = 'isp';

    case LOCAL_RATE = 'local_rate';

    case MOBILE = 'mobile';

    case OTHER = 'other';

    case PAGER = 'pager';

    case PAYPHONE = 'payphone';

    case PREMIUM_RATE = 'premium_rate';

    case SATELLITE = 'satellite';

    case SERVICE = 'service';

    case SHARED_COST = 'shared_cost';

    case SHORT_CODES_COMMERCIAL = 'short_codes_commercial';

    case TOLL_FREE = 'toll_free';

    case UNIVERSAL_ACCESS = 'universal_access';

    case UNKNOWN = 'unknown';

    case VPN = 'vpn';

    case VOICE_MAIL = 'voice_mail';

    case VOIP = 'voip';
}
