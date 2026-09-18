<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\VerificationManagement;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\Sandbox\SandboxAddPhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxDeletePhoneNumberResponse;
use Prelude\VerificationManagement\Sandbox\SandboxListPhoneNumbersResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface SandboxContract
{
    /**
     * @api
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
    ): SandboxAddPhoneNumberResponse;

    /**
     * @api
     *
     * @param string $phoneNumber The E.164 formatted phone number to remove from the sandbox list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePhoneNumber(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): SandboxDeletePhoneNumberResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        RequestOptions|array|null $requestOptions = null
    ): SandboxListPhoneNumbersResponse;
}
