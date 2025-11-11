<?php

declare(strict_types=1);

namespace Prelude\ServiceContracts;

use Prelude\Core\Exceptions\APIException;
use Prelude\RequestOptions;
use Prelude\Watch\WatchPredictParams;
use Prelude\Watch\WatchPredictResponse;
use Prelude\Watch\WatchSendEventsParams;
use Prelude\Watch\WatchSendEventsResponse;
use Prelude\Watch\WatchSendFeedbacksParams;
use Prelude\Watch\WatchSendFeedbacksResponse;

interface WatchContract
{
    /**
     * @api
     *
     * @param array<mixed>|WatchPredictParams $params
     *
     * @throws APIException
     */
    public function predict(
        array|WatchPredictParams $params,
        ?RequestOptions $requestOptions = null
    ): WatchPredictResponse;

    /**
     * @api
     *
     * @param array<mixed>|WatchSendEventsParams $params
     *
     * @throws APIException
     */
    public function sendEvents(
        array|WatchSendEventsParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendEventsResponse;

    /**
     * @api
     *
     * @param array<mixed>|WatchSendFeedbacksParams $params
     *
     * @throws APIException
     */
    public function sendFeedbacks(
        array|WatchSendFeedbacksParams $params,
        ?RequestOptions $requestOptions = null,
    ): WatchSendFeedbacksResponse;
}
