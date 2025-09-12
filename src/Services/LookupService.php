<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Implementation\HasRawResponse;
use Prelude\Lookup\LookupLookupParams;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\LookupContract;

use const Prelude\Core\OMIT as omit;

final class LookupService implements LookupContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
     *
     * @param list<Type|value-of<Type>> $type Optional features. Possible values are:
     *   * `cnam` - Retrieve CNAM (Caller ID Name) along with other information. Contact us if you need to use this functionality.
     *
     * @return LookupLookupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null
    ): LookupLookupResponse {
        $params = ['type' => $type];

        return $this->lookupRaw($phoneNumber, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return LookupLookupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function lookupRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null
    ): LookupLookupResponse {
        [$parsed, $options] = LookupLookupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['v2/lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: LookupLookupResponse::class,
        );
    }
}
