<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Transactional\TransactionalSendParams;
use Prelude\Transactional\TransactionalSendResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface TransactionalRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed>|TransactionalSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TransactionalSendResponse>
     *
     * @throws APIException
     */
    public function send(
        array|TransactionalSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
