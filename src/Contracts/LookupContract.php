<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Parameters\LookupLookupParam;
use Prelude\Parameters\LookupLookupParam\Type;
use Prelude\RequestOptions;
use Prelude\Responses\LookupLookupResponse;

interface LookupContract
{
    /**
     * @param array{type?: list<Type::*>}|LookupLookupParam $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParam $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
