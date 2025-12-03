<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\LookupContract;

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
     * @param array{type?: list<'cnam'>}|LookupLookupParams $params
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse {
        [$parsed, $options] = LookupLookupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: LookupLookupResponse::class,
        );
    }
}
