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
 * @phpstan-type LookupLookupResponseShape = array{
 *   caller_name?: string|null,
 *   country_code?: string|null,
 *   flags?: list<value-of<Flag>>|null,
 *   line_type?: value-of<LineType>|null,
 *   network_info?: NetworkInfo|null,
 *   original_network_info?: OriginalNetworkInfo|null,
 *   phone_number?: string|null,
 * }
 */
final class LookupLookupResponse implements BaseModel
{
    /** @use SdkModel<LookupLookupResponseShape> */
    use SdkModel;

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    #[Api(optional: true)]
    public ?string $caller_name;

    /**
     * The country code of the phone number.
     */
    #[Api(optional: true)]
    public ?string $country_code;

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
     * @var value-of<LineType>|null $line_type
     */
    #[Api(enum: LineType::class, optional: true)]
    public ?string $line_type;

    /**
     * The current carrier information.
     */
    #[Api(optional: true)]
    public ?NetworkInfo $network_info;

    /**
     * The original carrier information.
     */
    #[Api(optional: true)]
    public ?OriginalNetworkInfo $original_network_info;

    /**
     * The phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

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
     * @param LineType|value-of<LineType> $line_type
     * @param NetworkInfo|array{
     *   carrier_name?: string|null, mcc?: string|null, mnc?: string|null
     * } $network_info
     * @param OriginalNetworkInfo|array{
     *   carrier_name?: string|null, mcc?: string|null, mnc?: string|null
     * } $original_network_info
     */
    public static function with(
        ?string $caller_name = null,
        ?string $country_code = null,
        ?array $flags = null,
        LineType|string|null $line_type = null,
        NetworkInfo|array|null $network_info = null,
        OriginalNetworkInfo|array|null $original_network_info = null,
        ?string $phone_number = null,
    ): self {
        $obj = new self;

        null !== $caller_name && $obj['caller_name'] = $caller_name;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $flags && $obj['flags'] = $flags;
        null !== $line_type && $obj['line_type'] = $line_type;
        null !== $network_info && $obj['network_info'] = $network_info;
        null !== $original_network_info && $obj['original_network_info'] = $original_network_info;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj['caller_name'] = $callerName;

        return $obj;
    }

    /**
     * The country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

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
        $obj['flags'] = $flags;

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
        $obj['line_type'] = $lineType;

        return $obj;
    }

    /**
     * The current carrier information.
     *
     * @param NetworkInfo|array{
     *   carrier_name?: string|null, mcc?: string|null, mnc?: string|null
     * } $networkInfo
     */
    public function withNetworkInfo(NetworkInfo|array $networkInfo): self
    {
        $obj = clone $this;
        $obj['network_info'] = $networkInfo;

        return $obj;
    }

    /**
     * The original carrier information.
     *
     * @param OriginalNetworkInfo|array{
     *   carrier_name?: string|null, mcc?: string|null, mnc?: string|null
     * } $originalNetworkInfo
     */
    public function withOriginalNetworkInfo(
        OriginalNetworkInfo|array $originalNetworkInfo
    ): self {
        $obj = clone $this;
        $obj['original_network_info'] = $originalNetworkInfo;

        return $obj;
    }

    /**
     * The phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
