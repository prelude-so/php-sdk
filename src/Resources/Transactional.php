<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\TransactionalContract;
use Prelude\Core\Serde;
use Prelude\Models\SendResponse;
use Prelude\Parameters\Transactional\SendParams;
use Prelude\RequestOptions;

final class Transactional implements TransactionalContract
{
    public function __construct(private Client $client) {}

    /**
     * @param array{
     *   templateID?: string,
     *   to?: string,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string,
     *   from?: string,
     *   locale?: string,
     *   variables?: array<string, string>,
     * } $params
     */
    public function send(
        array $params,
        ?RequestOptions $requestOptions = null
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
}
