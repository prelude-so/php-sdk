<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Models\LookupResponse;
use Prelude\Parameters\Lookup\LookupParams;
use Prelude\Parameters\Lookup\LookupParams\Type;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @param array{type?: list<Type::*>}|LookupParams $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupResponse;
}
