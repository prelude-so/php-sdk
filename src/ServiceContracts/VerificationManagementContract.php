<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

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

interface VerificationManagementContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action
     * @param array<mixed>|VerificationManagementDeletePhoneNumberParams $params
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        array|VerificationManagementDeletePhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementDeletePhoneNumberResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action> $action
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementListPhoneNumbersResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listSenderIDs(
        ?RequestOptions $requestOptions = null
    ): VerificationManagementListSenderIDsResponse;

    /**
     * @api
     *
     * @param VerificationManagementSetPhoneNumberParams\Action|value-of<VerificationManagementSetPhoneNumberParams\Action> $action
     * @param array<mixed>|VerificationManagementSetPhoneNumberParams $params
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        array|VerificationManagementSetPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationManagementSubmitSenderIDParams $params
     *
     * @throws APIException
     */
    public function submitSenderID(
        array|VerificationManagementSubmitSenderIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSubmitSenderIDResponse;
}
