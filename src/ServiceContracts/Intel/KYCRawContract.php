<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\Intel;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Intel\KYC\KYCMatchParams;
use Prelude\Intel\KYC\KYCMatchResponse;
use Prelude\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface KYCRawContract
{
    /**
     * @api
     *
     * @param string $phone An E.164 formatted phone number whose subscriber identity to match against.
     * @param array<string,mixed>|KYCMatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KYCMatchResponse>
     *
     * @throws APIException
     */
    public function match(
        string $phone,
        array|KYCMatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
