<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponseItem;
use Prelude\VerificationManagement\VerificationManagementSubmitSenderIDResponse;

interface VerificationManagementContract
{
    /**
     * @api
     *
     * @return list<VerificationManagementListSenderIDsResponseItem>
     *
     * @throws APIException
     */
    public function listSenderIDs(
        ?RequestOptions $requestOptions = null
    ): array;

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
