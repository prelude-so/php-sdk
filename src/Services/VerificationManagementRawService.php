<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagementRawContract;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberParams\Action;
use Prelude\VerificationManagement\VerificationManagementDeletePhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementListPhoneNumbersResponse;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberParams;
use Prelude\VerificationManagement\VerificationManagementSetPhoneNumberResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDParams;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

final class VerificationManagementRawService implements VerificationManagementRawContract
{
    // @phpstan-ignore-next-line
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
     * @param Action|value-of<Action> $action The action type - either "allow" or "block"
     * @param array{
     *   phoneNumber: string
     * }|VerificationManagementDeletePhoneNumberParams $params
     *
     * @return BaseResponse<VerificationManagementDeletePhoneNumberResponse>
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        Action|string $action,
        array|VerificationManagementDeletePhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationManagementDeletePhoneNumberParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|value-of<\Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action> $action The action type - either "allow" or "block"
     *
     * @return BaseResponse<VerificationManagementListPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        \Prelude\VerificationManagement\VerificationManagementListPhoneNumbersParams\Action|string $action,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<VerificationManagementListSenderIDsResponse>
     *
     * @throws APIException
     */
    public function listSenderIDs(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param VerificationManagementSetPhoneNumberParams\Action|value-of<VerificationManagementSetPhoneNumberParams\Action> $action The action type - either "allow" or "block"
     * @param array{
     *   phoneNumber: string
     * }|VerificationManagementSetPhoneNumberParams $params
     *
     * @return BaseResponse<VerificationManagementSetPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function setPhoneNumber(
        VerificationManagementSetPhoneNumberParams\Action|string $action,
        array|VerificationManagementSetPhoneNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationManagementSetPhoneNumberParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   senderID: string
     * }|VerificationManagementSubmitSenderIDParams $params
     *
     * @return BaseResponse<VerificationManagementSubmitSenderIDResponse>
     *
     * @throws APIException
     */
    public function submitSenderID(
        array|VerificationManagementSubmitSenderIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationManagementSubmitSenderIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/verification/management/sender-id',
            body: (object) $parsed,
            options: $options,
            convert: VerificationManagementSubmitSenderIDResponse::class,
        );
    }
}
