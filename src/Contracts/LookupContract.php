<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\LookupResponse;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @param array{phoneNumber?: string, type?: list<string>} $params
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
    public function lookup(
        string $phoneNumber,
        array $params,
        mixed $requestOptions = []
    ): LookupResponse;
}
