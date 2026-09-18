<?php

declare(strict_types=1);

namespace Prelude\Services\Intel;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\Intel\KYC\KYCMatchResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\Intel\KYCContract;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class KYCService implements KYCContract
{
    /**
     * @api
     */
    public KYCRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KYCRawService($client);
    }

    /**
     * @api
     *
     * Verify identity attributes against the subscriber record held by the end-user's mobile operator. Send a phone number along with the attributes to check; Prelude resolves the operator internally and returns a per-attribute match. Currently available for France only (Orange, SFR, Bouygues) and must be enabled for your account.
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
    ): KYCMatchResponse {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'birthdate' => $birthdate,
                'country' => $country,
                'email' => $email,
                'familyName' => $familyName,
                'givenName' => $givenName,
                'locality' => $locality,
                'postalCode' => $postalCode,
                'region' => $region,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->match($phone, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
