<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\Intel;

use Prelude\Core\Exceptions\APIException;
use Prelude\Intel\KYC\KYCMatchResponse;
use Prelude\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface KYCContract
{
    /**
     * @api
     *
     * @param string $phone An E.164 formatted phone number whose subscriber identity to match against.
     * @param string $address the street address
     * @param string $birthdate The date of birth in ISO 8601 (`YYYY-MM-DD`) format. Compared exactly.
     * @param string $country The ISO 3166-1 alpha-2 country code. Compared exactly.
     * @param string $email the email address
     * @param string $familyName the end-user's family (last) name
     * @param string $givenName the end-user's given (first) name
     * @param string $locality the locality (city)
     * @param string $postalCode The postal code. Compared exactly.
     * @param string $region the region, state, or province
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function match(
        string $phone,
        ?string $address = null,
        ?string $birthdate = null,
        ?string $country = null,
        ?string $email = null,
        ?string $familyName = null,
        ?string $givenName = null,
        ?string $locality = null,
        ?string $postalCode = null,
        ?string $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): KYCMatchResponse;
}
