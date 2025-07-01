<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\SendResponse;
use Prelude\RequestOptions;

interface TransactionalContract
{
    /**
     * @param array{
     *
     *       templateID?: string,
     *       to?: string,
     *       callbackURL?: string,
     *       correlationID?: string,
     *       expiresAt?: string,
     *       from?: string,
     *       locale?: string,
     *       variables?: array<string, string>,
     *
     * } $params
     * @param RequestOptions|array{
     *
     *       timeout?: float|null,
     *       maxRetries?: int|null,
     *       initialRetryDelay?: float|null,
     *       maxRetryDelay?: float|null,
     *       extraHeaders?: list<string>|null,
     *       extraQueryParams?: list<string>|null,
     *       extraBodyParams?: list<string>|null,
     *
     * }|null $requestOptions
     */
    public function send(
        array $params,
        mixed $requestOptions = []
    ): SendResponse;
}
