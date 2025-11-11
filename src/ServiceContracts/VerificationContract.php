<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Verification\VerificationCheckParams;
use Prelude\Verification\VerificationCheckResponse;
use Prelude\Verification\VerificationCreateParams;
use Prelude\Verification\VerificationNewResponse;

interface VerificationContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerificationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VerificationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationCheckParams $params
     *
     * @throws APIException
     */
    public function check(
        array|VerificationCheckParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCheckResponse;
}
