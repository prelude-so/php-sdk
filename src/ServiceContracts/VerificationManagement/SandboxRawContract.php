<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\VerificationManagement;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberParams;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxDeletePhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface SandboxRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SandboxAddPhoneNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SandboxAddPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function addPhoneNumber(
        array|SandboxAddPhoneNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber The E.164 formatted phone number to remove from the sandbox list.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SandboxDeletePhoneNumberResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SandboxListPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
