<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

interface VerificationManagementContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action
     * @param string $phoneNumber An E.164 formatted phone number to remove from the list.
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementDeletePhoneNumberResponse;

    /**
     * @api
     *
     * @param Action|value-of<Action> $action
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deletePhoneNumberRaw(
        Action|string $action,
        array $params,
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
     * @param \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action> $action
     * @param string $phoneNumber An E.164 formatted phone number to add to the list.
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action,
        $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action> $action
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setPhoneNumberRaw(
        \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse;

    /**
     * @api
     *
     * @param string $senderID the sender ID to add
     *
     * @throws APIException
     */
    public function submitSenderID(
        $senderID,
        ?RequestOptions $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function submitSenderIDRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse;
}
