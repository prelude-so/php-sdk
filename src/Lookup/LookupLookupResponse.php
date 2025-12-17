<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Lookup\LookupLookupResponse\Flag;
use Prelude\Lookup\LookupLookupResponse\LineType;
use Prelude\Lookup\LookupLookupResponse\NetworkInfo;
use Prelude\Lookup\LookupLookupResponse\OriginalNetworkInfo;

/**
 * @phpstan-import-type NetworkInfoShape from \Prelude\Lookup\LookupLookupResponse\NetworkInfo
 * @phpstan-import-type OriginalNetworkInfoShape from \Prelude\Lookup\LookupLookupResponse\OriginalNetworkInfo
 *
 * @phpstan-type LookupLookupResponseShape = array{
 *   callerName?: string|null,
 *   countryCode?: string|null,
 *   flags?: list<Flag|value-of<Flag>>|null,
 *   lineType?: null|LineType|value-of<LineType>,
 *   networkInfo?: null|NetworkInfo|NetworkInfoShape,
 *   originalNetworkInfo?: null|OriginalNetworkInfo|OriginalNetworkInfoShape,
 *   phoneNumber?: string|null,
 * }
 */
final class LookupLookupResponse implements BaseModel
{
    /** @use SdkModel<LookupLookupResponseShape> */
    use SdkModel;

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    #[Optional('caller_name')]
    public ?string $callerName;

    /**
     * The country code of the phone number.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * A list of flags associated with the phone number.
     *   * `ported` - Indicates the phone number has been transferred from one carrier to another.
     *   * `temporary` - Indicates the phone number is likely a temporary or virtual number, often used for verification services or burner phones.
     *
     * @var list<value-of<Flag>>|null $flags
     */
    #[Optional(list: Flag::class)]
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
    #[Optional('line_type', enum: LineType::class)]
    public ?string $lineType;

    /**
     * The current carrier information.
     */
    #[Optional('network_info')]
    public ?NetworkInfo $networkInfo;

    /**
     * The original carrier information.
     */
    #[Optional('original_network_info')]
    public ?OriginalNetworkInfo $originalNetworkInfo;

    /**
     * The phone number.
     */
    #[Optional('phone_number')]
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
     * @param list<Flag|value-of<Flag>>|null $flags
     * @param LineType|value-of<LineType>|null $lineType
     * @param NetworkInfo|NetworkInfoShape|null $networkInfo
     * @param OriginalNetworkInfo|OriginalNetworkInfoShape|null $originalNetworkInfo
     */
    public static function with(
        ?string $callerName = null,
        ?string $countryCode = null,
        ?array $flags = null,
        LineType|string|null $lineType = null,
        NetworkInfo|array|null $networkInfo = null,
        OriginalNetworkInfo|array|null $originalNetworkInfo = null,
        ?string $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $callerName && $self['callerName'] = $callerName;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $flags && $self['flags'] = $flags;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $networkInfo && $self['networkInfo'] = $networkInfo;
        null !== $originalNetworkInfo && $self['originalNetworkInfo'] = $originalNetworkInfo;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The CNAM (Caller ID Name) associated with the phone number. Contact us if you need to use this functionality. Once enabled, put `cnam` option to `type` query parameter.
     */
    public function withCallerName(string $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * The country code of the phone number.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
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
        $self = clone $this;
        $self['flags'] = $flags;

        return $self;
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
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }

    /**
     * The current carrier information.
     *
     * @param NetworkInfo|NetworkInfoShape $networkInfo
     */
    public function withNetworkInfo(NetworkInfo|array $networkInfo): self
    {
        $self = clone $this;
        $self['networkInfo'] = $networkInfo;

        return $self;
    }

    /**
     * The original carrier information.
     *
     * @param OriginalNetworkInfo|OriginalNetworkInfoShape $originalNetworkInfo
     */
    public function withOriginalNetworkInfo(
        OriginalNetworkInfo|array $originalNetworkInfo
    ): self {
        $self = clone $this;
        $self['originalNetworkInfo'] = $originalNetworkInfo;

        return $self;
    }

    /**
     * The phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
