<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface VerificationRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VerificationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerificationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationCheckParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        array|VerificationCheckParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
