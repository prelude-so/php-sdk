<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\LookupResponse;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @param array{phoneNumber?: string, type?: list<string>} $params
     */
    public function lookup(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): LookupResponse;
}
