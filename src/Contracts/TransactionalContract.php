<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\SendResponse;
use Prelude\Parameters\Transactional\SendParams;
use Prelude\RequestOptions;

interface TransactionalContract
{
    /**
     * @param SendParams|array{
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
        array|SendParams $params,
        ?RequestOptions $requestOptions = null
    ): SendResponse;
}
