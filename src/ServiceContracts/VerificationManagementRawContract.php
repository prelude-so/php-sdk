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

interface VerificationManagementRawContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action The action type - either "allow" or "block"
     * @param array<mixed>|VerificationManagementDeletePhoneNumberParams $params
     *
     * @return BaseResponse<VerificationManagementDeletePhoneNumberResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        array|VerificationManagementDeletePhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action> $action The action type - either "allow" or "block"
     *
     * @return BaseResponse<VerificationManagementListPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<VerificationManagementListSenderIDsResponse>
     *
     * @throws APIException
     */
    public function listSenderIDs(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param VerificationManagementSetPhoneNumberParams\Action|value-of<VerificationManagementSetPhoneNumberParams\Action> $action The action type - either "allow" or "block"
     * @param array<mixed>|VerificationManagementSetPhoneNumberParams $params
     *
     * @return BaseResponse<VerificationManagementSetPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        array|VerificationManagementSetPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationManagementSubmitSenderIDParams $params
     *
     * @return BaseResponse<VerificationManagementSubmitSenderIDResponse>
     *
     * @throws APIException
     */
    public function submitSenderID(
        array|VerificationManagementSubmitSenderIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
