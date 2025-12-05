<?php

declare(strict_types=1);

namespace Prelude\Notify\NotifyGetSubscriptionConfigResponse;

use Prelude\Core\Attributes\Api;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;

/**
 * @phpstan-type MoPhoneNumberShape = array{
 *   country_code: string, phone_number: string
 * }
 */
final class MoPhoneNumber implements BaseModel
{
    /** @use SdkModel<MoPhoneNumberShape> */
    use SdkModel;

    /**
     * The ISO 3166-1 alpha-2 country code.
     */
    #[Api]
    public string $country_code;

    /**
     * The phone number in E.164 format for long codes, or short code format for short codes.
     */
    #[Api]
    public string $phone_number;

    /**
     * `new MoPhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MoPhoneNumber::with(country_code: ..., phone_number: ...)
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
    public static function with(
        string $country_code,
        string $phone_number
    ): self {
        $obj = new self;

        $obj['country_code'] = $country_code;
        $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * The ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * The phone number in E.164 format for long codes, or short code format for short codes.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
