<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponse;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

interface VerificationManagementContract
{
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
