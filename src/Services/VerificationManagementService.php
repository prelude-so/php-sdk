<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagementContract;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

/**
 * Verify phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class VerificationManagementService implements VerificationManagementContract
{
    /**
     * @api
     */
    public VerificationManagementRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationManagementRawService($client);
    }

    /**
     * @api
     *
     * Remove a phone number from the allow or block list.
     *
     * This operation is idempotent - re-deleting the same phone number will not result in errors. If the phone number does not exist in the specified list, the operation will succeed without making any changes.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param Action|value-of<Action> $action The action type - either "allow" or "block"
     * @param string $phoneNumber An E.164 formatted phone number to remove from the list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementDeletePhoneNumberResponse {
        $params = Util::removeNulls(['phoneNumber' => $phoneNumber]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePhoneNumber($action, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the list of phone numbers in the allow or block list.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action> $action The action type - either "allow" or "block"
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementListPhoneNumbersResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPhoneNumbers($action, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve sender IDs list.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSenderIDs(
        RequestOptions|array|null $requestOptions = null
    ): VerificationManagementListSenderIDsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSenderIDs(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add a phone number to the allow or block list.
     *
     * This operation is idempotent - re-adding the same phone number will not result in duplicate entries or errors. If the phone number already exists in the specified list, the operation will succeed without making any changes.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action> $action The action type - either "allow" or "block"
     * @param string $phoneNumber An E.164 formatted phone number to add to the list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse {
        $params = Util::removeNulls(['phoneNumber' => $phoneNumber]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setPhoneNumber($action, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows you to submit a new sender ID for verification purposes.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param string $senderID the sender ID to add
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitSenderID(
        string $senderID,
        RequestOptions|array|null $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse {
        $params = Util::removeNulls(['senderID' => $senderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submitSenderID(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
