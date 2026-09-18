<?php

declare(strict_types=1);

namespace Prelude\Intel\KYC;

use Prelude\Core\Attributes\Optional;
use Prelude\Core\Concerns\SdkModel;
use Prelude\Core\Contracts\BaseModel;
use Prelude\Intel\KYC\KYCMatchResponse\AddressMatch;
use Prelude\Intel\KYC\KYCMatchResponse\BirthdateMatch;
use Prelude\Intel\KYC\KYCMatchResponse\CountryMatch;
use Prelude\Intel\KYC\KYCMatchResponse\EmailMatch;
use Prelude\Intel\KYC\KYCMatchResponse\FamilyNameMatch;
use Prelude\Intel\KYC\KYCMatchResponse\GivenNameMatch;
use Prelude\Intel\KYC\KYCMatchResponse\LocalityMatch;
use Prelude\Intel\KYC\KYCMatchResponse\PostalCodeMatch;
use Prelude\Intel\KYC\KYCMatchResponse\RegionMatch;

/**
 * The per-attribute match result. Each `<attribute>_match` field is one of `true`, `false`, or `not_available` (the operator could not answer for that attribute). Fuzzy attributes additionally return a `<attribute>_match_score` (0-99 similarity) when they do not match exactly; the score is omitted on a match or when `not_available`.
 *
 * @phpstan-type KYCMatchResponseShape = array{
 *   addressMatch?: null|AddressMatch|value-of<AddressMatch>,
 *   addressMatchScore?: int|null,
 *   birthdateMatch?: null|BirthdateMatch|value-of<BirthdateMatch>,
 *   countryCode?: string|null,
 *   countryMatch?: null|CountryMatch|value-of<CountryMatch>,
 *   emailMatch?: null|EmailMatch|value-of<EmailMatch>,
 *   emailMatchScore?: int|null,
 *   familyNameMatch?: null|FamilyNameMatch|value-of<FamilyNameMatch>,
 *   familyNameMatchScore?: int|null,
 *   givenNameMatch?: null|GivenNameMatch|value-of<GivenNameMatch>,
 *   givenNameMatchScore?: int|null,
 *   localityMatch?: null|LocalityMatch|value-of<LocalityMatch>,
 *   localityMatchScore?: int|null,
 *   operator?: string|null,
 *   phoneNumber?: string|null,
 *   postalCodeMatch?: null|PostalCodeMatch|value-of<PostalCodeMatch>,
 *   regionMatch?: null|RegionMatch|value-of<RegionMatch>,
 *   regionMatchScore?: int|null,
 *   requestID?: string|null,
 * }
 */
final class KYCMatchResponse implements BaseModel
{
    /** @use SdkModel<KYCMatchResponseShape> */
    use SdkModel;

    /**
     * Whether the street address matched the operator's record.
     *
     * @var value-of<AddressMatch>|null $addressMatch
     */
    #[Optional('address_match', enum: AddressMatch::class)]
    public ?string $addressMatch;

    /**
     * Similarity score (0-99) for the address. Returned only on a non-match.
     */
    #[Optional('address_match_score')]
    public ?int $addressMatchScore;

    /**
     * Whether the date of birth matched the operator's record. Compared exactly; never scored.
     *
     * @var value-of<BirthdateMatch>|null $birthdateMatch
     */
    #[Optional('birthdate_match', enum: BirthdateMatch::class)]
    public ?string $birthdateMatch;

    /**
     * The country code of the phone number.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Whether the country matched the operator's record. Compared exactly; never scored.
     *
     * @var value-of<CountryMatch>|null $countryMatch
     */
    #[Optional('country_match', enum: CountryMatch::class)]
    public ?string $countryMatch;

    /**
     * Whether the email address matched the operator's record.
     *
     * @var value-of<EmailMatch>|null $emailMatch
     */
    #[Optional('email_match', enum: EmailMatch::class)]
    public ?string $emailMatch;

    /**
     * Similarity score (0-99) for the email. Returned only on a non-match.
     */
    #[Optional('email_match_score')]
    public ?int $emailMatchScore;

    /**
     * Whether the family name matched the operator's record.
     *
     * @var value-of<FamilyNameMatch>|null $familyNameMatch
     */
    #[Optional('family_name_match', enum: FamilyNameMatch::class)]
    public ?string $familyNameMatch;

    /**
     * Similarity score (0-99) for the family name. Returned only on a non-match.
     */
    #[Optional('family_name_match_score')]
    public ?int $familyNameMatchScore;

    /**
     * Whether the given name matched the operator's record.
     *
     * @var value-of<GivenNameMatch>|null $givenNameMatch
     */
    #[Optional('given_name_match', enum: GivenNameMatch::class)]
    public ?string $givenNameMatch;

    /**
     * Similarity score (0-99) for the given name. Returned only on a non-match.
     */
    #[Optional('given_name_match_score')]
    public ?int $givenNameMatchScore;

    /**
     * Whether the locality matched the operator's record.
     *
     * @var value-of<LocalityMatch>|null $localityMatch
     */
    #[Optional('locality_match', enum: LocalityMatch::class)]
    public ?string $localityMatch;

    /**
     * Similarity score (0-99) for the locality. Returned only on a non-match.
     */
    #[Optional('locality_match_score')]
    public ?int $localityMatchScore;

    /**
     * The mobile operator that answered the match.
     */
    #[Optional]
    public ?string $operator;

    /**
     * The phone number that was matched, in E.164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Whether the postal code matched the operator's record. Compared exactly; never scored.
     *
     * @var value-of<PostalCodeMatch>|null $postalCodeMatch
     */
    #[Optional('postal_code_match', enum: PostalCodeMatch::class)]
    public ?string $postalCodeMatch;

    /**
     * Whether the region matched the operator's record.
     *
     * @var value-of<RegionMatch>|null $regionMatch
     */
    #[Optional('region_match', enum: RegionMatch::class)]
    public ?string $regionMatch;

    /**
     * Similarity score (0-99) for the region. Returned only on a non-match.
     */
    #[Optional('region_match_score')]
    public ?int $regionMatchScore;

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    #[Optional('request_id')]
    public ?string $requestID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AddressMatch|value-of<AddressMatch>|null $addressMatch
     * @param BirthdateMatch|value-of<BirthdateMatch>|null $birthdateMatch
     * @param CountryMatch|value-of<CountryMatch>|null $countryMatch
     * @param EmailMatch|value-of<EmailMatch>|null $emailMatch
     * @param FamilyNameMatch|value-of<FamilyNameMatch>|null $familyNameMatch
     * @param GivenNameMatch|value-of<GivenNameMatch>|null $givenNameMatch
     * @param LocalityMatch|value-of<LocalityMatch>|null $localityMatch
     * @param PostalCodeMatch|value-of<PostalCodeMatch>|null $postalCodeMatch
     * @param RegionMatch|value-of<RegionMatch>|null $regionMatch
     */
    public static function with(
        AddressMatch|string|null $addressMatch = null,
        ?int $addressMatchScore = null,
        BirthdateMatch|string|null $birthdateMatch = null,
        ?string $countryCode = null,
        CountryMatch|string|null $countryMatch = null,
        EmailMatch|string|null $emailMatch = null,
        ?int $emailMatchScore = null,
        FamilyNameMatch|string|null $familyNameMatch = null,
        ?int $familyNameMatchScore = null,
        GivenNameMatch|string|null $givenNameMatch = null,
        ?int $givenNameMatchScore = null,
        LocalityMatch|string|null $localityMatch = null,
        ?int $localityMatchScore = null,
        ?string $operator = null,
        ?string $phoneNumber = null,
        PostalCodeMatch|string|null $postalCodeMatch = null,
        RegionMatch|string|null $regionMatch = null,
        ?int $regionMatchScore = null,
        ?string $requestID = null,
    ): self {
        $self = new self;

        null !== $addressMatch && $self['addressMatch'] = $addressMatch;
        null !== $addressMatchScore && $self['addressMatchScore'] = $addressMatchScore;
        null !== $birthdateMatch && $self['birthdateMatch'] = $birthdateMatch;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $countryMatch && $self['countryMatch'] = $countryMatch;
        null !== $emailMatch && $self['emailMatch'] = $emailMatch;
        null !== $emailMatchScore && $self['emailMatchScore'] = $emailMatchScore;
        null !== $familyNameMatch && $self['familyNameMatch'] = $familyNameMatch;
        null !== $familyNameMatchScore && $self['familyNameMatchScore'] = $familyNameMatchScore;
        null !== $givenNameMatch && $self['givenNameMatch'] = $givenNameMatch;
        null !== $givenNameMatchScore && $self['givenNameMatchScore'] = $givenNameMatchScore;
        null !== $localityMatch && $self['localityMatch'] = $localityMatch;
        null !== $localityMatchScore && $self['localityMatchScore'] = $localityMatchScore;
        null !== $operator && $self['operator'] = $operator;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $postalCodeMatch && $self['postalCodeMatch'] = $postalCodeMatch;
        null !== $regionMatch && $self['regionMatch'] = $regionMatch;
        null !== $regionMatchScore && $self['regionMatchScore'] = $regionMatchScore;
        null !== $requestID && $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * Whether the street address matched the operator's record.
     *
     * @param AddressMatch|value-of<AddressMatch> $addressMatch
     */
    public function withAddressMatch(AddressMatch|string $addressMatch): self
    {
        $self = clone $this;
        $self['addressMatch'] = $addressMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the address. Returned only on a non-match.
     */
    public function withAddressMatchScore(int $addressMatchScore): self
    {
        $self = clone $this;
        $self['addressMatchScore'] = $addressMatchScore;

        return $self;
    }

    /**
     * Whether the date of birth matched the operator's record. Compared exactly; never scored.
     *
     * @param BirthdateMatch|value-of<BirthdateMatch> $birthdateMatch
     */
    public function withBirthdateMatch(
        BirthdateMatch|string $birthdateMatch
    ): self {
        $self = clone $this;
        $self['birthdateMatch'] = $birthdateMatch;

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
     * Whether the country matched the operator's record. Compared exactly; never scored.
     *
     * @param CountryMatch|value-of<CountryMatch> $countryMatch
     */
    public function withCountryMatch(CountryMatch|string $countryMatch): self
    {
        $self = clone $this;
        $self['countryMatch'] = $countryMatch;

        return $self;
    }

    /**
     * Whether the email address matched the operator's record.
     *
     * @param EmailMatch|value-of<EmailMatch> $emailMatch
     */
    public function withEmailMatch(EmailMatch|string $emailMatch): self
    {
        $self = clone $this;
        $self['emailMatch'] = $emailMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the email. Returned only on a non-match.
     */
    public function withEmailMatchScore(int $emailMatchScore): self
    {
        $self = clone $this;
        $self['emailMatchScore'] = $emailMatchScore;

        return $self;
    }

    /**
     * Whether the family name matched the operator's record.
     *
     * @param FamilyNameMatch|value-of<FamilyNameMatch> $familyNameMatch
     */
    public function withFamilyNameMatch(
        FamilyNameMatch|string $familyNameMatch
    ): self {
        $self = clone $this;
        $self['familyNameMatch'] = $familyNameMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the family name. Returned only on a non-match.
     */
    public function withFamilyNameMatchScore(int $familyNameMatchScore): self
    {
        $self = clone $this;
        $self['familyNameMatchScore'] = $familyNameMatchScore;

        return $self;
    }

    /**
     * Whether the given name matched the operator's record.
     *
     * @param GivenNameMatch|value-of<GivenNameMatch> $givenNameMatch
     */
    public function withGivenNameMatch(
        GivenNameMatch|string $givenNameMatch
    ): self {
        $self = clone $this;
        $self['givenNameMatch'] = $givenNameMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the given name. Returned only on a non-match.
     */
    public function withGivenNameMatchScore(int $givenNameMatchScore): self
    {
        $self = clone $this;
        $self['givenNameMatchScore'] = $givenNameMatchScore;

        return $self;
    }

    /**
     * Whether the locality matched the operator's record.
     *
     * @param LocalityMatch|value-of<LocalityMatch> $localityMatch
     */
    public function withLocalityMatch(LocalityMatch|string $localityMatch): self
    {
        $self = clone $this;
        $self['localityMatch'] = $localityMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the locality. Returned only on a non-match.
     */
    public function withLocalityMatchScore(int $localityMatchScore): self
    {
        $self = clone $this;
        $self['localityMatchScore'] = $localityMatchScore;

        return $self;
    }

    /**
     * The mobile operator that answered the match.
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The phone number that was matched, in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Whether the postal code matched the operator's record. Compared exactly; never scored.
     *
     * @param PostalCodeMatch|value-of<PostalCodeMatch> $postalCodeMatch
     */
    public function withPostalCodeMatch(
        PostalCodeMatch|string $postalCodeMatch
    ): self {
        $self = clone $this;
        $self['postalCodeMatch'] = $postalCodeMatch;

        return $self;
    }

    /**
     * Whether the region matched the operator's record.
     *
     * @param RegionMatch|value-of<RegionMatch> $regionMatch
     */
    public function withRegionMatch(RegionMatch|string $regionMatch): self
    {
        $self = clone $this;
        $self['regionMatch'] = $regionMatch;

        return $self;
    }

    /**
     * Similarity score (0-99) for the region. Returned only on a non-match.
     */
    public function withRegionMatchScore(int $regionMatchScore): self
    {
        $self = clone $this;
        $self['regionMatchScore'] = $regionMatchScore;

        return $self;
    }

    /**
     * A string that identifies this specific request. Report it back to us to help us diagnose your issues.
     */
    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }
}
