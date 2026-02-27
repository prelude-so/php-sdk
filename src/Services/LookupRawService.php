<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\LookupRawContract;

/**
 * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class LookupRawService implements LookupRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
     *
     * @param string $phoneNumber An E.164 formatted phone number to look up.
     * @param array{type?: list<Type|value-of<Type>>}|LookupLookupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LookupLookupResponse>
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
