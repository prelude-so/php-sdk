<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Contracts\BaseResponse;
use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksResponse;

/**
 * @phpstan-import-type RequestOpts from \Prelude\RequestOptions
 */
interface WatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WatchPredictParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchPredictResponse>
     *
     * @throws APIException
     */
    public function predict(
        array|WatchPredictParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WatchSendEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchSendEventsResponse>
     *
     * @throws APIException
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|WatchSendFeedbacksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WatchSendFeedbacksResponse>
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
