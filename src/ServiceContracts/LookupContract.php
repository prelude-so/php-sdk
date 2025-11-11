<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;

interface LookupContract
{
    /**
     * @api
     *
     * @param array<mixed>|LookupLookupParams $params
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): LookupLookupResponse;
}
