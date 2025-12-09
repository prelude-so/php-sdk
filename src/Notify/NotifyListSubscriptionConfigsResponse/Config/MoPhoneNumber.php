<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyListSubscriptionConfigsResponse\Config;

use Prelude\Core\Attributes\Required;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type MoPhoneNumberShape = array{
 *   countryCode: string, phoneNumber: string
 * }
 */
final class MoPhoneNumber implements BaseModel
{
    /** @use SdkModel<MoPhoneNumberShape> */
    use SdkModel;

    /**
     * The ISO 3166-1 alpha-2 country code.
     */
    #[Required('country_code')]
    public string $countryCode;

    /**
     * The phone number in E.164 format for long codes, or short code format for short codes.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new MoPhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MoPhoneNumber::with(countryCode: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MoPhoneNumber)->withCountryCode(...)->withPhoneNumber(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $countryCode, string $phoneNumber): self
    {
        $obj = new self;

        $obj['countryCode'] = $countryCode;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * The phone number in E.164 format for long codes, or short code format for short codes.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
