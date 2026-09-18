<?php

declare(strict_types=1);

namespace Prelude\Services\VerificationManagement;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagement\SandboxRawContract;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberParams;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxDeletePhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse;

/**
 * Verify phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class SandboxRawService implements SandboxRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Register a phone number as a sandbox number and associate it with a fixed attempt code. Subsequent verification attempts against this number will not trigger a real SMS/call and will validate against the configured attempt code.
     *
     * This operation is idempotent - re-adding the same phone number will overwrite the existing attempt code.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param array{
     *   attemptCode: string, phoneNumber: string
     * }|SandboxAddPhoneNumberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SandboxAddPhoneNumberResponse>
     *
     * @throws APIException
     */
    public function addPhoneNumber(
        array|SandboxAddPhoneNumberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SandboxAddPhoneNumberParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'v2/verification/management/phone-numbers/sandbox',
            body: (object) $parsed,
            options: $options,
            convert: SandboxAddPhoneNumberResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove a phone number from the sandbox list.
     *
     * This operation is idempotent - deleting a phone number that is not in the sandbox list will succeed without making any changes.
     *
     * In order to get access to this endpoint, contact our support team.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'v2/verification/management/phone-numbers/sandbox/%1$s', $phoneNumber,
            ],
            options: $requestOptions,
            convert: SandboxDeletePhoneNumberResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of sandbox phone numbers for the account. Sandbox numbers are test numbers that bypass the real verification flow and return a fixed attempt code.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SandboxListPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/verification/management/phone-numbers/sandbox',
            options: $requestOptions,
            convert: SandboxListPhoneNumbersResponse::class,
        );
    }
}
