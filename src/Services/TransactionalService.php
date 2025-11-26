<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\TransactionalContract;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendResponse;

final class TransactionalService implements TransactionalContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * Legacy route maintained for backward compatibility. Migrate to `/v2/notify` instead.
     *
     * @param array{
     *   template_id: string,
     *   to: string,
     *   callback_url?: string,
     *   correlation_id?: string,
     *   expires_at?: string,
     *   from?: string,
     *   locale?: string,
     *   preferred_channel?: 'sms'|'rcs'|'whatsapp',
     *   variables?: array<string,string>,
     * }|TransactionalSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): TransactionalSendResponse {
        [$parsed, $options] = TransactionalSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
            convert: TransactionalSendResponse::class,
        );
    }
}
