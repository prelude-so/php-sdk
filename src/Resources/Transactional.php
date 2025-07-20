<?php

declare(strict_types=1);

namespace Prelude\Resources;

use Prelude\Client;
use Prelude\Contracts\TransactionalContract;
use Prelude\Core\Conversion;
use Prelude\Parameters\TransactionalSendParam;
use Prelude\RequestOptions;
use Prelude\Responses\TransactionalSendResponse;

final class Transactional implements TransactionalContract
{
    public function __construct(private Client $client) {}

    /**
     * @param TransactionalSendParam|array{
     *   templateID: string,
     *   to: string,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string,
     *   from?: string,
     *   locale?: string,
     *   variables?: array<string, string>,
     * } $params
     */
    public function send(
        array|TransactionalSendParam $params,
        ?RequestOptions $requestOptions = null
    ): TransactionalSendResponse {
        [$parsed, $options] = TransactionalSendParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(TransactionalSendResponse::class, value: $resp);
    }
}
