<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts\Verification\Phone;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Verification\Phone\History\HistoryGetResponse;
use Prelude\Verification\Phone\History\HistoryListParams\Channel;
use Prelude\Verification\Phone\History\HistoryListParams\DevicePlatform;
use Prelude\Verification\Phone\History\HistoryListParams\Status;
use Prelude\Verification\Phone\History\HistoryListResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface HistoryContract
{
    /**
     * @api
     *
     * @param string $id the verification identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): HistoryGetResponse;

    /**
     * @api
     *
     * @param list<Channel|value-of<Channel>> $channels Only verifications that could use one of these channels. Repeat the parameter for several values.
     * @param string $cursor pagination cursor from the previous response
     * @param DevicePlatform|value-of<DevicePlatform> $devicePlatform only verifications created from this device platform
     * @param \DateTimeInterface $from Only verifications created at or after this RFC 3339 timestamp. Goes with `to`, at most 6 months apart. Without them the whole history is searched.
     * @param int $limit maximum number of verifications to return per page
     * @param int $maxAttempts Only verifications that sent at most this many messages. `0` keeps the verifications that never sent one.
     * @param int $minAttempts only verifications that sent at least this many messages
     * @param string $phoneNumber Only verifications targeting this E.164 phone number. The leading `+` may be omitted.
     * @param string $region only verifications of phone numbers from this region, as an ISO 3166-1 alpha-2 code
     * @param Status|value-of<Status> $status Only verifications in this status. `pending_check` cannot be filtered on.
     * @param string $templateID Only verifications sent with this template, as returned in `template_id` by [Get a phone verification](/verify/v2/api-reference/history/get-a-phone-verification). Built-in templates (`prelude:*`) cannot be filtered on.
     * @param \DateTimeInterface $to Only verifications created at or before this RFC 3339 timestamp. Goes with `from`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?array $channels = null,
        ?string $cursor = null,
        DevicePlatform|string|null $devicePlatform = null,
        ?\DateTimeInterface $from = null,
        int $limit = 50,
        ?int $maxAttempts = null,
        ?int $minAttempts = null,
        ?string $phoneNumber = null,
        ?string $region = null,
        Status|string|null $status = null,
        ?string $templateID = null,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): HistoryListResponse;
}
