<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Lookup\LookupLookupParams;
use Prelude\Lookup\LookupLookupResponse;
use Prelude\RequestOptions;

interface LookupRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber An E.164 formatted phone number to look up.
     * @param array<string,mixed>|LookupLookupParams $params
     *
     * @return BaseResponse<LookupLookupResponse>
     *
     * @throws APIException
     */
    public function lookup(
        string $phoneNumber,
        array|LookupLookupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
