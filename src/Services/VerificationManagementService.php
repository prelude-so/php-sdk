<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagementContract;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDParams;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

final class VerificationManagementService implements VerificationManagementContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Remove a phone number from the allow or block list.
     *
     * This operation is idempotent - re-deleting the same phone number will not result in errors. If the phone number does not exist in the specified list, the operation will succeed without making any changes.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param Action|value-of<Action> $action
     * @param string $phoneNumber An E.164 formatted phone number to remove from the list.
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerificationManagementDeletePhoneNumberResponse {
        $params = ['phoneNumber' => $phoneNumber];

        return $this->deletePhoneNumberRaw($action, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): VerificationManagementDeletePhoneNumberResponse {
        [
            $parsed, $options,
        ] = VerificationManagementDeletePhoneNumberParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['v2/verification/management/phone-numbers/%1$s', $action],
            body: (object) $parsed,
            options: $options,
            convert: VerificationManagementDeletePhoneNumberResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of phone numbers in the allow or block list.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action> $action
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementListPhoneNumbersResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['v2/verification/management/phone-numbers/%1$s', $action],
            options: $requestOptions,
            convert: VerificationManagementListPhoneNumbersResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'v2/verification/management/sender-id',
            options: $requestOptions,
            convert: VerificationManagementListSenderIDsResponse::class,
        );
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
     * @param VerificationManagementSetPhoneNumberParams\Action|value-of<VerificationManagementSetPhoneNumberParams\Action> $action
     * @param string $phoneNumber An E.164 formatted phone number to add to the list.
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        $phoneNumber,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse {
        $params = ['phoneNumber' => $phoneNumber];

        return $this->setPhoneNumberRaw($action, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param VerificationManagementSetPhoneNumberParams\Action|value-of<VerificationManagementSetPhoneNumberParams\Action> $action
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setPhoneNumberRaw(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationManagementSetPhoneNumberResponse {
        [
            $parsed, $options,
        ] = VerificationManagementSetPhoneNumberParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['v2/verification/management/phone-numbers/%1$s', $action],
            body: (object) $parsed,
            options: $options,
            convert: VerificationManagementSetPhoneNumberResponse::class,
        );
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
        $senderID,
        ?RequestOptions $requestOptions = null
    ): VerificationManagementSubmitSenderIDResponse {
        $params = ['senderID' => $senderID];

        return $this->submitSenderIDRaw($params, $requestOptions);
    }

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
    ): VerificationManagementSubmitSenderIDResponse {
        [
            $parsed, $options,
        ] = VerificationManagementSubmitSenderIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'v2/verification/management/sender-id',
            body: (object) $parsed,
            options: $options,
            convert: VerificationManagementSubmitSenderIDResponse::class,
        );
    }
}
