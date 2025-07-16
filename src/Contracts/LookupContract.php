<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\LookupResponse;
use Prelude\Parameters\LookupLookupParam;
use Prelude\Parameters\LookupLookupParam\Type;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @param array{type?: list<Type::*>}|LookupLookupParam $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParam $params,
        ?RequestOptions $requestOptions = null,
    ): LookupResponse;
}
