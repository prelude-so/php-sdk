<?php

declare(strict_types=1);

namespace Prelude\Services\Verification\Phone;

use Prelude\Client;
use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\Core\Util;
use Prelude\RequestOptions;
use Prelude\ServiceContracts\Verification\Phone\HistoryRawContract;
use Prelude\Verification\Phone\History\HistoryGetResponse;
use Prelude\Verification\Phone\History\HistoryListParams;
use Prelude\Verification\Phone\History\HistoryListParams\Channel;
use Prelude\Verification\Phone\History\HistoryListParams\DevicePlatform;
use Prelude\Verification\Phone\History\HistoryListParams\Status;
use Prelude\Verification\Phone\History\HistoryListResponse;

/**
 * Verify phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
final class HistoryRawService implements HistoryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve everything Prelude recorded for one phone verification: its outcome and the device, network and anti-fraud context it was created in, the chronological timeline of every message attempt and code check, and the anti-fraud signals you forwarded.
     *
     * The identifier is the `id` returned by [Create or retry a verification](/verify/v2/api-reference/create-or-retry-a-verification) or the `verification_id` of the verification webhooks. Both `lifecycle` and `signals` are optional: a verification can resolve with its top-level fields alone.
     *
     * @param string $id the verification identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HistoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/verification/phone/history/%1$s', $id],
            options: $requestOptions,
            convert: HistoryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List your phone verifications, most recent first, one entry per verification with its outcome, channels, attempts and cost. Every filter is optional and they combine with AND.
     *
     * Use it to find every verification a phone number went through from your support tooling, then [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification) for the full timeline of one of them. A cursor is bound to the filters that produced it: pass `next_cursor` back with the exact same query parameters.
     *
     * @param array{
     *   channels?: list<Channel|value-of<Channel>>,
     *   cursor?: string,
     *   devicePlatform?: DevicePlatform|value-of<DevicePlatform>,
     *   from?: \DateTimeInterface,
     *   limit?: int,
     *   maxAttempts?: int,
     *   minAttempts?: int,
     *   phoneNumber?: string,
     *   region?: string,
     *   status?: value-of<Status>,
     *   templateID?: string,
     *   to?: \DateTimeInterface,
     * }|HistoryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HistoryListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|HistoryListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = HistoryListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/verification/phone/history',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'devicePlatform' => 'device_platform',
                    'maxAttempts' => 'max_attempts',
                    'minAttempts' => 'min_attempts',
                    'phoneNumber' => 'phone_number',
                    'templateID' => 'template_id',
                ],
            ),
            options: $options,
            convert: HistoryListResponse::class,
        );
    }
}
