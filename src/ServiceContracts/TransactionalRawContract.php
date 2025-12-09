<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendResponse;

interface TransactionalRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|TransactionalSendParams $params
     *
     * @return BaseResponse<TransactionalSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
