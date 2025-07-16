<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\LookupContract;
use Prelude\Core\Serde;
use Prelude\Models\LookupResponse;
use Prelude\Parameters\Lookup\LookupParams;
use Prelude\Parameters\Lookup\LookupParams\Type;
use Prelude\RequestOptions;

final class Lookup implements LookupContract
{
    public function __construct(private Client $client) {}

    /**
     * @param array{type?: list<Type::*>}|LookupParams $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupResponse {
        [$parsed, $options] = LookupParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'get',
            path: ['v2/lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(LookupResponse::class, value: $resp);
    }
}
