<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendResponse;

interface TransactionalContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|TransactionalSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): TransactionalSendResponse;
}
