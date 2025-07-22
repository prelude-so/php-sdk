<?php

declare(strict_types=1);

namespace Prelude\Responses;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\Model;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Core\Conversion\ListOf;
use Prelude\Responses\LookupLookupResponse\Flag;
use Prelude\Responses\LookupLookupResponse\LineType;
use Prelude\Responses\LookupLookupResponse\NetworkInfo;
use Prelude\Responses\LookupLookupResponse\OriginalNetworkInfo;

/**
 * @phpstan-type lookup_lookup_response_alias = array{
 *   callerName?: string,
 *   countryCode?: string,
 *   flags?: list<Flag::*>,
 *   lineType?: LineType::*,
 *   networkInfo?: NetworkInfo,
 *   originalNetworkInfo?: OriginalNetworkInfo,
 *   phoneNumber?: string,
 * }
 */
final class LookupLookupResponse implements BaseModel
{
    use Model;

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    /**
     * The country code of the phone number.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * A list of flags associated with the phone number.
     *   * `ported` - Indicates the phone number has been transferred from one carrier to another.
     *   * `temporary` - Indicates the phone number is likely a temporary or virtual number, often used for verification services or burner phones.
     *
     * @var null|list<Flag::*> $flags
     */
    #[Api(type: new ListOf(enum: Flag::class), optional: true)]
    public ?array $flags;

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
     * @var null|LineType::* $lineType
     */
    #[Api('line_type', enum: LineType::class, optional: true)]
    public ?string $lineType;

    /**
     * The current carrier information.
     */
    #[Api('network_info', optional: true)]
    public ?NetworkInfo $networkInfo;

    /**
     * The original carrier information.
     */
    #[Api('original_network_info', optional: true)]
    public ?OriginalNetworkInfo $originalNetworkInfo;

    /**
     * The phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * You must use named parameters to construct this object.
     *
     * @param null|list<Flag::*> $flags
     * @param null|LineType::*   $lineType
     */
    final public function __construct(
        ?string $callerName = null,
        ?string $countryCode = null,
        ?array $flags = null,
        ?string $lineType = null,
        ?NetworkInfo $networkInfo = null,
        ?OriginalNetworkInfo $originalNetworkInfo = null,
        ?string $phoneNumber = null,
    ) {
        self::introspect();
        $this->unsetOptionalProperties();

        null !== $callerName && $this->callerName = $callerName;
        null !== $countryCode && $this->countryCode = $countryCode;
        null !== $flags && $this->flags = $flags;
        null !== $lineType && $this->lineType = $lineType;
        null !== $networkInfo && $this->networkInfo = $networkInfo;
        null !== $originalNetworkInfo && $this
            ->originalNetworkInfo = $originalNetworkInfo
        ;
        null !== $phoneNumber && $this->phoneNumber = $phoneNumber;
    }
}
