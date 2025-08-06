<?php

declare(strict_types=1);

namespace Prelude\Contracts;

use Prelude\Parameters\LookupLookupParams;
use Prelude\Parameters\LookupLookupParams\Type;
use Prelude\RequestOptions;
use Prelude\Responses\LookupLookupResponse;

interface LookupContract
{
    /**
     * @param array{type?: list<Type::*>}|LookupLookupParams $params
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
