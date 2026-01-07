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

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface VerificationManagementContract
{
    /**
     * @api
     *
     * @param Action|string $action The action type - either "allow" or "block"
     * @param string $phoneNumber An E.164 formatted phone number to remove from the list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementDeletePhoneNumberResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action The action type - either "allow" or "block"
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementListPhoneNumbersResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSenderIDs(
        RequestOptions|array|null $requestOptions = null
    ): VerificationManagementListSenderIDsResponse;

    /**
     * @api
     *
     * @param \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action The action type - either "allow" or "block"
     * @param string $phoneNumber An E.164 formatted phone number to add to the list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse;

    /**
     * @api
     *
     * @param string $senderID the sender ID to add
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitSenderID(
        string $senderID,
        RequestOptions|array|null $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse;
}
