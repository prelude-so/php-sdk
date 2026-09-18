<?php

declare(strict_types=1);

namespace Prelude\Services\VerificationManagement;

use Prelude\Client;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagement\SandboxContract;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxDeletePhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse;

/**
 * Verify phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class SandboxService implements SandboxContract
{
    /**
     * @api
     */
    public SandboxRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SandboxRawService($client);
    }

    /**
     * @api
     *
     * Register a phone number as a sandbox number and associate it with a fixed attempt code. Subsequent verification attempts against this number will not trigger a real SMS/call and will validate against the configured attempt code.
     *
     * This operation is idempotent - re-adding the same phone number will overwrite the existing attempt code.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @param string $attemptCode the fixed attempt code that will validate verification attempts for this phone number
     * @param string $phoneNumber An E.164 formatted phone number to add to the sandbox list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addPhoneNumber(
        string $attemptCode,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): SandboxAddPhoneNumberResponse {
        $params = Util::removeNulls(
            ['attemptCode' => $attemptCode, 'phoneNumber' => $phoneNumber]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addPhoneNumber(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function deletePhoneNumber(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): SandboxDeletePhoneNumberResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePhoneNumber($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function listPhoneNumbers(
        RequestOptions|array|null $requestOptions = null
    ): SandboxListPhoneNumbersResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPhoneNumbers(requestOptions: $requestOptions);

        return $response->parse();
    }
}
