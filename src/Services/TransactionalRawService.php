<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\TransactionalRawContract;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendParams\Document;
use Prelude\Transactional\TransactionalSendParams\PreferredChannel;
use Prelude\Transactional\TransactionalSendResponse;

/**
 * Send transactional messages (deprecated - use Notify API instead).
 *
 * @phpstan-import-type DocumentShape from \Prelude\Transactional\TransactionalSendParams\Document
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
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
     *   document?: Document|DocumentShape,
     *   expiresAt?: string,
     *   from?: string,
     *   locale?: string,
     *   preferredChannel?: PreferredChannel|value-of<PreferredChannel>,
     *   variables?: array<string,string>,
     * }|TransactionalSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TransactionalSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        RequestOptions|array|null $requestOptions = null,
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
