<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\LookupResponse;
use Prelude\Parameters\Lookup\LookupParams;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @param array{type?: list<string>}|LookupParams $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupResponse;
}
