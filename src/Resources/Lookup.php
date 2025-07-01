<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\LookupContract;
use Prelude\Core\Serde;
use Prelude\Models\LookupResponse;
use Prelude\Parameters\Lookup\LookupParams;
use Prelude\RequestOptions;

class Lookup implements LookupContract
{
    public function __construct(protected Client $client) {}

    /**
     * @param array{phoneNumber?: string, type?: list<string>} $params
     * @param RequestOptions|array{
     *
     *     timeout?: float|null,
     *     maxRetries?: int|null,
     *     initialRetryDelay?: float|null,
     *     maxRetryDelay?: float|null,
     *     extraHeaders?: list<string>|null,
     *     extraQueryParams?: list<string>|null,
     *     extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function lookup(
        string $phoneNumber,
        array $params,
        mixed $requestOptions = []
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
