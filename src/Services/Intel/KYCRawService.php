<?php

declare(strict_types=1);

namespace Prelude\Services\Intel;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Intel\KYC\KYCMatchParams;
use Prelude\Intel\KYC\KYCMatchResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\Intel\KYCRawContract;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class KYCRawService implements KYCRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Verify identity attributes against the subscriber record held by the end-user's mobile operator. Send a phone number along with the attributes to check; Prelude resolves the operator internally and returns a per-attribute match. Currently available for France only (Orange, SFR, Bouygues) and must be enabled for your account.
     *
     * @param string $phone An E.164 formatted phone number whose subscriber identity to match against.
     * @param array{
     *   address?: string,
     *   birthdate?: string,
     *   country?: string,
     *   email?: string,
     *   familyName?: string,
     *   givenName?: string,
     *   locality?: string,
     *   postalCode?: string,
     *   region?: string,
     * }|KYCMatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KYCMatchResponse>
     *
     * @throws APIException
     */
    public function match(
        string $phone,
        array|KYCMatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KYCMatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['v2/intel/kyc/match/%1$s', $phone],
            body: (object) $parsed,
            options: $options,
            convert: KYCMatchResponse::class,
        );
    }
}
