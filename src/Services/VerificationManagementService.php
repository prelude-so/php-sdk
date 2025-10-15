<?php

declare(strict_types=1);

namespace Prelude\Services;

use Prelude\Client;
use Prelude\Core\Conversion\ListOf;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\VerificationManagementContract;
use Prelude\VerificationManagement\VerificationManagementListSenderIDsResponseItem;
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
     * Retrieve sender IDs list.
     *
     * In order to get access to this endpoint, contact our support team.
     *
     * @return list<VerificationManagementListSenderIDsResponseItem>
     *
     * @throws APIException
     */
    public function listSenderIDs(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'v2/verification/management/sender-id',
            options: $requestOptions,
            convert: new ListOf(
                VerificationManagementListSenderIDsResponseItem::class
            ),
        );
    }

    /**
     * @api
     *
     * This endpoint allows you to add a new sender ID for verification purposes.
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
