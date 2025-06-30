<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\RequestOptions;
use Prelude\Client;
use Prelude\Contracts\TransactionalContract;
use Prelude\Core\Serde;
use Prelude\Models\SendResponse;
use Prelude\Parameters\Transactional\SendParams;

class Transactional implements TransactionalContract
{
    /**
     * @param array{
     *
     *     templateID?: string,
     *     to?: string,
     *     callbackURL?: string,
     *     correlationID?: string,
     *     expiresAt?: string,
     *     from?: string,
     *     locale?: string,
     *     variables?: array<string, string>,
     *
     * } $params
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
    public function send(
        array $params,
        mixed $requestOptions = [],
    ): SendResponse {
        [$parsed, $options] = SendParams::parseRequest($params, $requestOptions);
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Serde::coerce(SendResponse::class, value: $resp);
    }

    public function __construct(protected Client $client)
    {
    }
}
