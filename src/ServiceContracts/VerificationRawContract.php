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

interface VerificationRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VerificationCreateParams $params
     *
     * @return BaseResponse<VerificationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationCheckParams $params
     *
     * @return BaseResponse<VerificationCheckResponse>
     *
     * @throws APIException
     */
    public function check(
        array|VerificationCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
