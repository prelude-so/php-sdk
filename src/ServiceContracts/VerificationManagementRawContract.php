<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDParams;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface VerificationManagementRawContract
{
    /**
     * @api
     *
     * @param Action|string $action The action type - either "allow" or "block"
     * @param array<string,mixed>|VerificationManagementDeletePhoneNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationManagementDeletePhoneNumberResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        array|VerificationManagementDeletePhoneNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action The action type - either "allow" or "block"
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationManagementListPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationManagementListSenderIDsResponse>
     *
     * @throws APIException
     */
    public function listSenderIDs(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param VerificationManagementSetPhoneNumberParams\Action|string $action The action type - either "allow" or "block"
     * @param array<string,mixed>|VerificationManagementSetPhoneNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationManagementSetPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        array|VerificationManagementSetPhoneNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationManagementSubmitSenderIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationManagementSubmitSenderIDResponse>
     *
     * @throws APIException
     */
    public function submitSenderID(
        array|VerificationManagementSubmitSenderIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
