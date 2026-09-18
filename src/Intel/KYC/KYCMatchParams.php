<?php

declare(strict_types=1);

namespace Prelude\Intel\KYC;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Concerns\SdkParams;
use Prelude\Core\Contracts\BaseModel;

/**
 * Verify identity attributes against the subscriber record held by the end-user's mobile operator. Send a phone number along with the attributes to check; Prelude resolves the operator internally and returns a per-attribute match. Currently available for France only (Orange, SFR, Bouygues) and must be enabled for your account.
 *
 * @see Prelude\Services\Intel\KYCService::match()
 *
 * @phpstan-type KYCMatchParamsShape = array{
 *   address?: string|null,
 *   birthdate?: string|null,
 *   country?: string|null,
 *   email?: string|null,
 *   familyName?: string|null,
 *   givenName?: string|null,
 *   locality?: string|null,
 *   postalCode?: string|null,
 *   region?: string|null,
 * }
 */
final class KYCMatchParams implements BaseModel
{
    /** @use SdkModel<KYCMatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The street address.
     */
    #[Optional]
    public ?string $address;

    /**
     * The date of birth in ISO 8601 (`YYYY-MM-DD`) format. Compared exactly.
     */
    #[Optional]
    public ?string $birthdate;

    /**
     * The ISO 3166-1 alpha-2 country code. Compared exactly.
     */
    #[Optional]
    public ?string $country;

    /**
     * The email address.
     */
    #[Optional]
    public ?string $email;

    /**
     * The end-user's family (last) name.
     */
    #[Optional('family_name')]
    public ?string $familyName;

    /**
     * The end-user's given (first) name.
     */
    #[Optional('given_name')]
    public ?string $givenName;

    /**
     * The locality (city).
     */
    #[Optional]
    public ?string $locality;

    /**
     * The postal code. Compared exactly.
     */
    #[Optional('postal_code')]
    public ?string $postalCode;

    /**
     * The region, state, or province.
     */
    #[Optional]
    public ?string $region;

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
        ?string $address = null,
        ?string $birthdate = null,
        ?string $country = null,
        ?string $email = null,
        ?string $familyName = null,
        ?string $givenName = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $region = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $birthdate && $self['birthdate'] = $birthdate;
        null !== $country && $self['country'] = $country;
        null !== $email && $self['email'] = $email;
        null !== $familyName && $self['familyName'] = $familyName;
        null !== $givenName && $self['givenName'] = $givenName;
        null !== $locality && $self['locality'] = $locality;
        null !== $postalCode && $self['postalCode'] = $postalCode;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * The street address.
     */
    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * The date of birth in ISO 8601 (`YYYY-MM-DD`) format. Compared exactly.
     */
    public function withBirthdate(string $birthdate): self
    {
        $self = clone $this;
        $self['birthdate'] = $birthdate;

        return $self;
    }

    /**
     * The ISO 3166-1 alpha-2 country code. Compared exactly.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * The email address.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The end-user's family (last) name.
     */
    public function withFamilyName(string $familyName): self
    {
        $self = clone $this;
        $self['familyName'] = $familyName;

        return $self;
    }

    /**
     * The end-user's given (first) name.
     */
    public function withGivenName(string $givenName): self
    {
        $self = clone $this;
        $self['givenName'] = $givenName;

        return $self;
    }

    /**
     * The locality (city).
     */
    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    /**
     * The postal code. Compared exactly.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * The region, state, or province.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
