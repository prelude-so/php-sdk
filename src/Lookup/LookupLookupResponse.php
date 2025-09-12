<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Lookup\LookupLookupResponse\Flag;
use Prelude\Lookup\LookupLookupResponse\LineType;
use Prelude\Lookup\LookupLookupResponse\NetworkInfo;
use Prelude\Lookup\LookupLookupResponse\OriginalNetworkInfo;

/**
 * @phpstan-type lookup_lookup_response = array{
 *   callerName?: string,
 *   countryCode?: string,
 *   flags?: list<value-of<Flag>>,
 *   lineType?: value-of<LineType>,
 *   networkInfo?: NetworkInfo,
 *   originalNetworkInfo?: OriginalNetworkInfo,
 *   phoneNumber?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class LookupLookupResponse implements BaseModel
{
    /** @use SdkModel<lookup_lookup_response> */
    use SdkModel;

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
     * @var list<value-of<Flag>>|null $flags
     */
    #[Api(list: Flag::class, optional: true)]
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
     * @var value-of<LineType>|null $lineType
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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Flag|value-of<Flag>> $flags
     * @param LineType|value-of<LineType> $lineType
     */
    public static function with(
        ?string $callerName = null,
        ?string $countryCode = null,
        ?array $flags = null,
        LineType|string|null $lineType = null,
        ?NetworkInfo $networkInfo = null,
        ?OriginalNetworkInfo $originalNetworkInfo = null,
        ?string $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $callerName && $obj->callerName = $callerName;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $flags && $obj->flags = array_map(fn ($v) => $v instanceof Flag ? $v->value : $v, $flags);
        null !== $lineType && $obj->lineType = $lineType instanceof LineType ? $lineType->value : $lineType;
        null !== $networkInfo && $obj->networkInfo = $networkInfo;
        null !== $originalNetworkInfo && $obj->originalNetworkInfo = $originalNetworkInfo;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->callerName = $callerName;

        return $obj;
    }

    /**
     * The country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * A list of flags associated with the phone number.
     *   * `ported` - Indicates the phone number has been transferred from one carrier to another.
     *   * `temporary` - Indicates the phone number is likely a temporary or virtual number, often used for verification services or burner phones.
     *
     * @param list<Flag|value-of<Flag>> $flags
     */
    public function withFlags(array $flags): self
    {
        $obj = clone $this;
        $obj->flags = array_map(fn ($v) => $v instanceof Flag ? $v->value : $v, $flags);

        return $obj;
    }

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
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $obj = clone $this;
        $obj->lineType = $lineType instanceof LineType ? $lineType->value : $lineType;

        return $obj;
    }

    /**
     * The current carrier information.
     */
    public function withNetworkInfo(NetworkInfo $networkInfo): self
    {
        $obj = clone $this;
        $obj->networkInfo = $networkInfo;

        return $obj;
    }

    /**
     * The original carrier information.
     */
    public function withOriginalNetworkInfo(
        OriginalNetworkInfo $originalNetworkInfo
    ): self {
        $obj = clone $this;
        $obj->originalNetworkInfo = $originalNetworkInfo;

        return $obj;
    }

    /**
     * The phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
