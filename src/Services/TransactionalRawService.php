<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\TransactionalRawContract;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;
use Prelude\Transactional\TransactionalSendResponse;

final class TransactionalRawService implements TransactionalRawContract
{
    // @phpstan-ignore-next-line
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
     *   templateID: string,
     *   to: string,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: 'sms'|'rcs'|'whatsapp'|PreferredChannel,
     *   variables?: array<string,string>,
     * }|TransactionalSendParams $params
     *
     * @return BaseResponse<TransactionalSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TransactionalSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/transactional',
            body: (object) $parsed,
            options: $options,
            convert: TransactionalSendResponse::class,
        );
    }
}
