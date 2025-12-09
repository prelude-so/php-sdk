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

interface WatchRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|WatchPredictParams $params
     *
     * @return BaseResponse<WatchPredictResponse>
     *
     * @throws APIException
     */
    public function predict(
        array|WatchPredictParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|WatchSendEventsParams $params
     *
     * @return BaseResponse<WatchSendEventsResponse>
     *
     * @throws APIException
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|WatchSendFeedbacksParams $params
     *
     * @return BaseResponse<WatchSendFeedbacksResponse>
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
