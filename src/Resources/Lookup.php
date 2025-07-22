<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\LookupContract;
use Prelude\Core\Conversion;
use Prelude\Parameters\LookupLookupParam;
use Prelude\Parameters\LookupLookupParam\Type;
use Prelude\RequestOptions;
use Prelude\Responses\LookupLookupResponse;

final class Lookup implements LookupContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
     *
     * @param array{type?: list<Type::*>}|LookupLookupParam $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParam $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse {
        [$parsed, $options] = LookupLookupParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: ['v2/lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(LookupLookupResponse::class, value: $resp);
    }
}
