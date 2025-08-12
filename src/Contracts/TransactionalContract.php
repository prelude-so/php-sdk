<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\RequestOptions;
use Prelude\Responses\Transactional\TransactionalSendResponse;
use Prelude\Transactional\TransactionalSendParams;

interface TransactionalContract
{
    /**
     * @param array{
     *   templateID: string,
     *   to: string,
     *   callbackURL?: string,
     *   correlationID?: string,
     *   expiresAt?: string,
     *   from?: string,
     *   locale?: string,
     *   variables?: array<string, string>,
     * }|TransactionalSendParams $params
     */
    public function send(
        array|TransactionalSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): TransactionalSendResponse;
}
