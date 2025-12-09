<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagementContract;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

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
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        string $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementDeletePhoneNumberResponse {
        $params = ['phoneNumber' => $phoneNumber];

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
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        ?RequestOptions $requestOptions = null,
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
     * @throws APIException
     */
    public function listSenderIDs(
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        \Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams\Action|string $action,
        string $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse {
        $params = ['phoneNumber' => $phoneNumber];

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
     *
     * @throws APIException
     */
    public function submitSenderID(
        string $senderID,
        ?RequestOptions $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse {
        $params = ['senderID' => $senderID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submitSenderID(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
