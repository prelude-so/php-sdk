<?php

declare(strict_types=1);

namespace Prelude\Lookup;

use Prelude\Client;
use Prelude\Contracts\LookupContract;
use Prelude\Core\Conversion;
use Prelude\Lookup\LookupLookupParams\Type;
use Prelude\RequestOptions;
use Prelude\Responses\Lookup\LookupLookupResponse;

final class LookupService implements LookupContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve detailed information about a phone number including carrier data, line type, and portability status.
     *
     * @param array{type?: list<Type::*>}|LookupLookupParams $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse {
        [$parsed, $options] = LookupLookupParams::parseRequest(
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
